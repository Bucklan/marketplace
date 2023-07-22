@extends('layout.admin')
@section('title','Edit page')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h3 >Edit Page</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-10 justify-content-center">
            <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name Product</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Insert Name Product" value="{{$product->name}}">
                        @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Content Product</label>
                        <textarea class="form-control" name="description" id="description"
                                  placeholder="Insert Content Product">{{$product->description}}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price Product</label>
                        <input type="number" class="form-control" id="price" name="price"
                               placeholder="Insert Price Product" value="{{$product->price}}">
                        @error('price')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category Product</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $cats)
                                <option @if($product->category_id==$cats->id) selected @endif value="{{$cats->id}}">{{$cats->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity Product</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                               placeholder="Insert Quantity Product" value="{{$product->quantity}}">
                        @error('quantity')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Product</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success">EDIT</button>
                </form>
            </div>
        </div>
    </div>
@endsection
