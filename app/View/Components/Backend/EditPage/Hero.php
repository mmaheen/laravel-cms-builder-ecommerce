<?php

namespace App\View\Components\Backend\EditPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public $image;
    public $title;
    public $description;
    public $buttonColor;
    public $buttonTitle;
    /**
     * Create a new component instance.
     */
    public function __construct($image, $title, $description, $buttonColor, $buttonTitle)
    {
        //
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->buttonColor = $buttonColor;
        $this->buttonTitle = $buttonTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.edit-page.hero');
    }
}
