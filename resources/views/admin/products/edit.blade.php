@extends('layout.admin')
@section('title','EDIT page')
@section('content')
    <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name Product</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="{{$product->name}}" value="{{$product->name}}">
            @error('name')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content Product</label>
            <textarea class="form-control" name="content" id="content" placeholder="{{$product->content}}">{{$product->content}}</textarea>
            @error('content')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price Product</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="{{$product->price}}" value="{{$product->price}}">
            @error('price')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category Product</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $cats)
                    <option @if($cats->id==$product->category->id) selected
                            @endif value="{{$cats->id}}">{{$cats->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Product</label>
            <input type="file" value="{{$product->image}}" name="image" id="image" class="form-control">
            @error('image')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-success">EDIT</button>
    </form>
@endsection
