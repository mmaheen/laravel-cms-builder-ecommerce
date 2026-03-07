<?php

namespace App\View\Components\Backend\EditPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Overview extends Component
{
    public $overview;
    /**
     * Create a new component instance.
     */
    public function __construct($overview)
    {
        //
        $this->overview = $overview;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.edit-page.overview');
    }
}
