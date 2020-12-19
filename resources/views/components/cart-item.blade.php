<div class="cart-list-item p-2">
    <div class="row m-2">
        <div class="col-lg-2 mb-3 mb-lg-0 image"
             style="background-image: url('{{ Storage::url($item->shoe->image) }}')"></div>
        <div class="col-lg-6 d-flex align-items-center text-primary font-weight-bold">
            {{ $item->shoe->name }}
        </div>
        <div class="col-lg-1 text-center d-flex align-items-center">
            {{ $item->qty }}
        </div>
        <div class="col-lg-2 d-flex align-items-center">
            Rp {{ number_format($item->qty * $item->shoe->price) }}
        </div>
        <div class="col-lg-1 mt-2 mt-lg-0 d-flex align-items-center">
            <a class="btn btn-outline-primary" href="{{ route("cart.edit", [$item->id]) }}">Edit</a>
        </div>
    </div>
</div>
