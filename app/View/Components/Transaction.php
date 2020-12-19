<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * A transaction list item component that will be displayed
 * on transactions.blade.php as <x-transaction> element.
 * Makes use of Laravel component.
 *
 * @package App\View\Components
 */
class Transaction extends Component
{
    /**
     * Transaction model that is passed from foreach loop
     * in transaction page blade template that can be accessed
     * in components/transaction.blade.php
     *
     * @var \App\Transaction
     */
    public $item;

    /**
     * Whether to show the transaction owner.
     *
     * @var bool
     */
    public $showUserName;

    /**
     * Create a new component instance.
     *
     * @param \App\Transaction $item
     * @param bool $showUserName
     */
    public function __construct(\App\Transaction $item, bool $showUserName)
    {
        $this->item = $item;
        $this->showUserName = $showUserName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.transaction');
    }
}
