@extends('layouts.app')

@section('content')
    <div>
        @include('include.messages')
        <h1 class="mb-4">{{ $shoe->name }}</h1>
        <div class="shoe-details-container">
            <div class="image" style="background-image: url('{{ Storage::url($shoe->image) }}')"></div>
            <div>
                <p>{{ $shoe->description }}</p>
                <p class="price">Rp {{ number_format($shoe->price) }}</p>
                @can("isMember")
                    <a class="btn btn-primary" href="{{ route("add-to-cart", [$shoe->id]) }}">Add to Cart</a>
                @elsecan("isAdmin")
                    <a class="btn btn-primary" href="{{ route("shoes.edit", [$shoe->id]) }}">Update Shoe</a>
                @endcan
            </div>
        </div>
    </div>
@endsection
