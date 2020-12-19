<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth routes but disable email confirmation
// and password reset routes since we don't need them in this project
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

// Shoes listing and details
Route::get('/', 'ShoeController@index')->name("home");
Route::resource("shoes", "ShoeController")->except(["destroy", "index"]);
Route::get("/shoes/{id}/add-to-cart", "ShoeController@addToCart")->name("add-to-cart");

// Cart
Route::resource("cart", "CartController")->except(["show", "create"]);
Route::post("/cart/checkout", "CartController@checkout")->name("checkout");

// Transactions
Route::get("/transactions", "TransactionController@userTransactions")->name("user-transactions");
Route::get("/transactions/all", "TransactionController@allTransactions")->name("all-transactions");
