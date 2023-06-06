@extends('layout.admin')
@section('title','create page')
@section('content')

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name Product</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Insert Name Product">
            @error('name')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content Product</label>
            <textarea class="form-control" name="content" id="content" placeholder="Insert Content Product"></textarea>
            @error('content')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price Product</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Insert Price Product">
            @error('price')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category Product</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $cats)
                    <option value="{{$cats->id}}">{{$cats->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Product</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
    <button class="btn btn-success">CREATE</button>
</form>
@endsection
