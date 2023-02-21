<?php

namespace Manta\LaravelCms\Http\Livewire\Cms;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class CmsNavigation extends Component
{
    public ?string $currentRouteName = null;
    public ?string $activeHome = null;
    public ?string $activeModules = null;

    public function mount()
    {
        $this->currentRouteName = Route::currentRouteName();

        if(preg_match('/(users|pages)/', $this->currentRouteName)){
            $this->activeModules = 'active';
        } else {
            $this->activeHome = 'active';
        }
    }

    public function render()
    {
                return view('manta-laravel-cms::livewire.cms.cms-navigation')->layout('manta-laravel-cms::layouts.manta-bootstrap');
    }
}
