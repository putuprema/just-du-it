<div class="transaction-list-item">
    <div class="alert alert-info">
        <div class="row">
            <div class="col-lg-{{ $showUserName ? 4 : 6 }}">
                {{ $item->created_at }}
            </div>
            @if($showUserName)
                <div class="col-lg-4 text-lg-center">
                    <strong>{{ $item->user->username }}</strong>
                </div>
            @endif
            <div class="col-lg-{{ $showUserName ? 4 : 6 }} text-lg-right">
                Rp {{ number_format($item->total) }}
            </div>
        </div>
    </div>
    <div class="transaction-shoes-container">
        @foreach($item->shoes as $transactionShoe)
            <a title="{{ $transactionShoe->shoe->name }}" href="{{ route("shoes.show", [$transactionShoe->shoe->id]) }}"
               class="shoe-image"
               style="background-image: url('{{ Storage::url($transactionShoe->shoe->image) }}')"></a>
        @endforeach
    </div>
</div>
