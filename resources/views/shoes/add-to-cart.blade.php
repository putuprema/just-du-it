@extends('layouts.app')

@section("content")
    <div>
        <h1 class="mb-4">Add to Cart</h1>
        <div class="shoe-details-container mb-5">
            <div class="image" style="background-image: url('{{ Storage::url($shoe->image) }}')"></div>
            <div>
                <h3 class="mb-4">{{ $shoe->name }}</h3>
                <p>{{ $shoe->description }}</p>
                <p class="price">Rp {{ number_format($shoe->price) }}</p>
                <form method="POST" action="{{ route("cart.store") }}">
                    @csrf
                    <input type="hidden" name="shoeId" value="{{ $shoe->id }}">
                    <div class="row-cols-sm-2">
                        <div class="input-group">
                            <input type="number" placeholder="Quantity"
                                   class="form-control @error('qty') is-invalid @enderror" name="qty"
                                   value="{{ old("qty", 1) }}">
                            <div class="input-group-append ml-2">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </div>
                            @error('qty')
                            @include('include.input-field-error')
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
