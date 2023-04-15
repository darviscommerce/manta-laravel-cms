<?php

namespace Manta\LaravelCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallMantaLaravelCms extends Command
{
    protected $signature = 'manta:install';

    protected $description = 'Install Manta Laravel Users';

    public function handle()
    {
        $this->info('Installing Manta Laravel Bootstrap...');

        $this->info('Migrate...');
        $this->call('migrate');

        $this->info('Publishing configuration...');

        if (! $this->configExists('manta-cms.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        if ($this->confirm('Add a demo user?')) {
            $this->seedUserDemo();
        }

        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/Traits', app_path('Traits'));
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/Models', app_path('Models'));
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/Http', app_path('Http'));
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/views', resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/lang', resource_path('lang'));
        (new Filesystem)->copyDirectory(__DIR__.'/../public', public_path(''));

        if (! Str::contains(file_get_contents(base_path('routes/web.php')), "'manta.cms.general'")) {
            (new Filesystem)->append(base_path('routes/web.php'), file_get_contents(__DIR__.'/../stubs/web.php'));
        }

        // "Home" Route...
        // if(HOME != '/'.config('manta-cms.prefix').'/dashboard'){
            $this->replaceInFile("'/home'", "'/".config('manta-cms.prefix')."/dashboard'", app_path('Providers/RouteServiceProvider.php'));
            $this->replaceInFile("'/dashboard'", "'/".config('manta-cms.prefix')."/dashboard'", app_path('Providers/RouteServiceProvider.php'));
        // }

        $this->info('Yeah... Manta Laravel Bootstrap Installed');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Manta\LaravelCms\Providers\MantaCmsProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

       $this->call('vendor:publish', $params);
    }

    private function seedUserDemo()
    {
        DB::table('users')->where('email', 'demo@manta.website')->delete();
        DB::table('users')->insert([
            'name' => 'demo',
            'email' => 'demo@manta.website',
            'password' => Hash::make('password'),
        ]);
        $this->info('User added');
        $this->line('User: demo@manta.website');
        $this->line('Pass: password');
    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
