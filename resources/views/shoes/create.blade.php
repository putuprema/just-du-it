@extends('layouts.app')

@section('content')
    <div>
        <h1 class="mb-4">Add Shoe</h1>
        @include('include.messages')
        <form method="POST" action="{{ route("shoes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Shoe Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           placeholder="Input shoe name..." value="{{ old("name") }}">
                    @error('name')
                    @include('include.input-field-error')
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="8" class="form-control @error('description') is-invalid @enderror" id="description"
                              name="description"
                              placeholder="Input shoe description...">{{ old("description") }}</textarea>
                    @error('description')
                    @include('include.input-field-error')
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                           name="price" placeholder="Input shoe price (minimum Rp 100)..." value="{{ old("price") }}">
                    @error('price')
                    @include('include.input-field-error')
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Shoe Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                           name="image">
                    @error('image')
                    @include('include.input-field-error')
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary mt-5 w-100">Add Shoe</button>
        </form>
    </div>
@endsection
