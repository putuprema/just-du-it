<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Shoe;
use App\Transaction;
use App\TransactionShoe;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Controller for Cart management
 *
 * Only authenticated members can access the routes here,
 * validated with `Gate::authorize("isMember");` in each controller methods.
 *
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * CartController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }


    /**
     * Display a listing of the cart items.
     *
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function index()
    {
        Gate::authorize("isMember");

        $cart = Auth::user()->cart;

        return view("cart.index", [
            "cart" => $cart
        ]);
    }

    /**
     * Store a newly cart item in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        Gate::authorize("isMember");
        $this->validateInput($request);

        $user = Auth::user();
        $shoe = Shoe::find($request->input("shoeId"));

        // Find existing cart item with shoe id equal to input.
        // If exist, just add the qty instead of creating new cart item.
        $cart = Cart::where("user_id", $user->id)
            ->where("shoe_id", $shoe->id)
            ->first();

        if ($cart != null) {
            $cart->qty += $request->input("qty");
        } else {
            $cart = new Cart();
            $cart->qty = $request->input("qty");

            // associate cart with current user and selected shoe
            $cart->user()->associate($user);
            $cart->shoe()->associate($shoe);
        }

        $cart->save();

        return redirect(route("home"))
            ->with("success", "Item " . $cart->shoe->name . " has been added to cart");
    }

    /**
     * Validate input before editing cart or
     * adding item to cart.
     *
     * @param Request $request
     * @throws ValidationException
     */
    private function validateInput(Request $request)
    {
        $this->validate($request, [
            "shoeId" => ["required"],
            "qty" => ["required", "integer", "min:1"]
        ], [
            "qty.required" => "Quantity must be filled",
            "qty.integer" => "Quantity must be integer",
            "qty.min" => "Minimum quantity is 1"
        ]);
    }

    /**
     * Show the form for editing the specified cart item.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        Gate::authorize("isMember");

        $cartItem = $this->getCartItem($id);

        return view("cart.edit", [
            "cartItem" => $cartItem
        ]);
    }

    /**
     * Get cart item by ID.
     * Throws 404 if cart item does not exist.
     *
     * @param int $id
     * @return Cart|Model
     */
    private function getCartItem(int $id)
    {
        $cart = Cart::find($id);
        if ($cart == null) abort(404);
        return $cart;
    }

    /**
     * Update the specified cart item qty in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function update(Request $request, int $id)
    {
        Gate::authorize("isMember");
        $this->validateInput($request);

        $cart = $this->getCartItem($id);
        $cart->qty = $request->input("qty");
        $cart->save();

        return redirect(route("cart.index"));
    }

    /**
     * Remove the specified cart item from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(int $id)
    {
        Gate::authorize("isMember");
        $cart = $this->getCartItem($id);
        $cart->delete();

        return redirect(route("cart.index"))
            ->with("success", "Item " . $cart->shoe->name . " has been deleted from cart");
    }

    /**
     * Checkout all items in cart.
     *
     * @return Application|RedirectResponse|Redirector
     * @throws AuthorizationException
     * @throws Exception
     */
    public function checkout()
    {
        Gate::authorize("isMember");
        $user = Auth::user();
        $cart = $user->cart;

        if (count($cart) == 0) {
            return redirect(route("cart.index"))
                ->with("error", "You have no item to checkout");
        }

        $transaction = new Transaction();

        // associate transaction with current user
        $transaction->user()->associate($user);

        $transaction->total = 0;

        // map each cart product into TransactionShoe model to save what shoes
        // that users bought in this particular transaction
        $transactionItems = $cart->map(function (Cart $cart) use ($transaction) {
            $item = new TransactionShoe();
            $item->qty = $cart->qty;
            $item->price = $cart->shoe->price;
            $item->shoe()->associate($cart->shoe);
            $item->transaction()->associate($transaction);

            $transaction->total += ($item->qty * $item->price);

            return $item;
        });

        // save transaction entity
        $transaction->save();

        // save all the items bought to its associated transaction record
        $transaction->shoes()->saveMany($transactionItems);

        // delete all items in user's cart
        $user->cart()->delete();

        return redirect(route("home"))
            ->with("success", "Checkout success. Thank you for shopping at Just Du It!");
    }
}
