<?php

namespace Manta\LaravelCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallMantaLaravelCms extends Command
{
    protected $signature = 'mantalaravelusers:install';

    protected $description = 'Install Manta Laravel Users';

    public function handle()
    {
        $this->info('Installing Manta Laravel Bootstra...');

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

        $this->info('Installed Manta Laravel Bootstrap');
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
}
