<?php

namespace Manta\LaravelCms\View\Components\Manta;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComponentTinymce extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('manta-laravel-cms::components.manta.component-tinymce');
    }
}
