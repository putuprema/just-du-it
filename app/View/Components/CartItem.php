<?php

namespace App\View\Components;

use App\Cart;
use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * A cart list item component that will be displayed
 * on cart/index.blade.php as <x-cart-item> element.
 *
 * @package App\View\Components
 */
class CartItem extends Component
{
    /**
     * Cart model that is passed from foreach loop
     * in cart list blade template than can be accessed
     * in components/cart-item.blade.php
     *
     * @var Cart
     */
    public $item;

    /**
     * Create a new component instance.
     *
     * @param Cart $item
     */
    public function __construct(Cart $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.cart-item');
    }
}
