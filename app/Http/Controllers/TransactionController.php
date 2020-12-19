<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

/**
 * Controller for managing transactions
 *
 * For accessing transactions by all members, only admin accounts are allowed,
 * validated by `Gate::authorize("isAdmin");` in related controller methods.
 *
 * For accessing transactions by one member, only member that is owner of the transactions
 * are allowed, validated by `Gate::authorize("isMember");` in related controller methods.
 *
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{

    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get transactions done by currently authenticated member.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function userTransactions()
    {
        Gate::authorize("isMember");
        $user = Auth::user();

        $transactions = $user->transactions()->paginate(10);

        return view("transactions", [
            "transactions" => $transactions,
            "allUsers" => false
        ]);
    }

    /**
     * Get transactions by all members (admin access only)
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function allTransactions()
    {
        Gate::authorize("isAdmin");

        return view("transactions", [
            "transactions" => Transaction::paginate(10),
            "allUsers" => true
        ]);
    }
}
