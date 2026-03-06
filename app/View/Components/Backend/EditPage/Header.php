<?php

namespace App\View\Components\Backend\EditPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $headerTitle;
    public $sections;
    /**
     * Create a new component instance.
     */
    public function __construct($headerTitle, $sections)
    {
        //
        $this->headerTitle = $headerTitle;
        $this->sections = $sections;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.edit-page.header');
    }
}
