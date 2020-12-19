@extends('layouts.app')

@section('content')
    <div class="HomePage">
        @include('include.messages')
        <h1 class="mb-4">Our Collection</h1>
        <div class="shoes-collection-container">
            @foreach($shoes as $shoe)
                <x-shoe :shoe="$shoe"></x-shoe>
            @endforeach
        </div>
        <div class="mt-4 float-right">
            {{ $shoes->links() }}
        </div>
    </div>
@endsection
