<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * A shoe list item component that will be displayed
 * on shoes/index.blade.php as <x-shoe> element.
 * Makes use of Laravel component.
 *
 * @package App\View\Components
 */
class Shoe extends Component
{
    /**
     * Shoe model that is passed from foreach loop
     * in home page blade template that can be accessed
     * in components/shoe.blade.php
     *
     * @var \App\Shoe
     */
    public $shoe;

    /**
     * Create a new component instance.
     *
     * @param $shoe \App\Shoe
     */
    public function __construct(\App\Shoe $shoe)
    {
        $this->shoe = $shoe;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.shoe');
    }
}
