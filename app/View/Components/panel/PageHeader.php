<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

// use Illuminate\View\Component;

class PageHeader extends Component
{
    // public $isLogin;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->isLogin = $isLogin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.page-header');
    }
}
