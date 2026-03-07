<?php

namespace App\View\Components\Backend\EditPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public $hero;
    /**
     * Create a new component instance.
     */
    public function __construct($hero)
    {
        //
        $this->hero = $hero;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.edit-page.hero');
    }
}
