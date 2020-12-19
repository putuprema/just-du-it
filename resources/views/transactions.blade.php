@extends('layouts.app')

@section('content')
    <div>
        @include('include.messages')
        <h1 class="mb-4">All Transactions</h1>

        @if(count($transactions) > 0)
            @foreach($transactions as $t)
                <x-transaction :item="$t" :showUserName="$allUsers"></x-transaction>
            @endforeach
        @else
            <p>No transaction</p>
        @endif

        <div class="mt-4 float-right">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
