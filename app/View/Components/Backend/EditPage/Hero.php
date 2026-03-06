<?php

namespace App\View\Components\Backend\EditPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public $heroImage;
    public $heroTitle;
    public $heroDescription;
    public $heroButtonColor;
    public $heroButtonTitle;
    public $heroPrice;
    /**
     * Create a new component instance.
     */
    public function __construct($heroImage, $heroTitle, $heroDescription, $heroButtonColor, $heroButtonTitle, $heroPrice)
    {
        //
        $this->heroImage = $heroImage;
        $this->heroTitle = $heroTitle;
        $this->heroDescription = $heroDescription;
        $this->heroButtonColor = $heroButtonColor;
        $this->heroButtonTitle = $heroButtonTitle;
        $this->heroPrice = $heroPrice;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.edit-page.hero');
    }
}
