@extends('layouts.app')

@section('content')
    <div>
        @include("include.messages")
        <div class="d-flex align-items-center mb-4">
            <h1 class="mb-0 mr-auto">Cart</h1>
            @if(count($cart) > 0)
                <form method="POST" class="ml-auto" action="{{ route("checkout") }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            @endif
        </div>
        @if(count($cart) > 0)
            @foreach($cart as $cartItem)
                <x-cart-item :item="$cartItem"></x-cart-item>
            @endforeach
        @else
            <p>You have no item in cart.</p>
        @endif
    </div>
@endsection
