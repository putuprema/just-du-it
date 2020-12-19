@extends('layouts.app')

@section("content")
    <div>
        <h1 class="mb-4">Edit Cart</h1>
        <div class="shoe-details-container mb-5">
            <div class="image" style="background-image: url('{{ Storage::url($cartItem->shoe->image) }}')"></div>
            <div>
                <h3 class="mb-4">{{ $cartItem->shoe->name }}</h3>
                <p>{{ $cartItem->shoe->description }}</p>
                <p class="price">Rp {{ number_format($cartItem->shoe->price) }}</p>
                <form method="POST" action="{{ route("cart.update", [$cartItem->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="shoeId" value="{{ $cartItem->shoe->id }}">
                    <div class="row-cols-sm-2">
                        <div class="input-group">
                            <input type="number" placeholder="Quantity"
                                   class="form-control @error('qty') is-invalid @enderror" name="qty"
                                   value="{{ old("qty", $cartItem->qty) }}">
                            <div class="input-group-append ml-2">
                                <button class="btn btn-primary" type="submit">Update Cart</button>
                            </div>
                            @error('qty')
                            @include('include.input-field-error')
                            @enderror
                        </div>
                    </div>
                </form>
                <form method="POST" action="{{ route("cart.destroy", [$cartItem->id]) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-outline-primary mt-3">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
