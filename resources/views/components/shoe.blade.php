<div class="shoe-item">
    <div class="image" style="background-image: url('{{ Storage::url($shoe->image) }}')"></div>
    <a class="name text-center" href="{{ route("shoes.show", [$shoe->id]) }}">{{ $shoe->name }}</a>
    <p class="mb-0 text-center">Rp {{ number_format($shoe->price) }}</p>
</div>
