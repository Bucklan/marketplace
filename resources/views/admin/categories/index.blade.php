@extends('layout.admin')

@section('title','categories page')

@section('content')
    <h1>categories page</h1>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".createCategroy">Create
        Category
    </button>

    <div class="modal fade createCategroy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 ">
                        <div class="col-md-12">
                            <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name Categroy</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Insert Name Categroy">
                                    @error('name')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image Category</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        @error('image')
                                        <div class="alert alert-danger mt-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-success">CREATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table" width="100%">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Categories</th>
            <th scope="col">products</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th>{{$category->id}}</th>
                <th> <img src="{{asset($category->image)}}"
                          width="100" height="100" alt="..."/></th>
                <td>{{$category->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".products">
                        Products
                    </button>

                    <div class="modal fade products" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="container px-4 px-lg-5 my-5">
                                    <div class="row gx-4 gx-lg-5 ">
                                        <div class="col-md-12">

                                            @foreach($category->products as $product)
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                        <!-- Image -->
                                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                             data-mdb-ripple-color="light">
                                                            <img src="{{asset($product->image)}}"
                                                                 class="w-100" alt="..."/>
                                                            <a href="#!">
                                                                <div class="mask"
                                                                     style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                            </a>
                                                        </div>
                                                        <!-- Image -->
                                                    </div>

                                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                        <!-- Data -->
                                                        <p><strong>{{$product->name}}</strong></p>
                                                        <p>{{$product->content}}</p>
                                                        <p>Category: {{$product->category->name}}</p>
                                                        <p>Seller: {{$product->user->name}}</p>
                                                        <!-- Data -->
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".editcategory">
                        edit
                    </button>

                    <div class="modal fade editcategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="container px-4 px-lg-5 my-5">
                                    <div class="row gx-4 gx-lg-5 ">
                                        <div class="col-md-12">
                                            <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name Categroy</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           value="{{$category->name}}">
                                                    @error('name')
                                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                                    @enderror
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Image Categroy</label>
                                                        <input type="file" class="form-control-file" value="{{$category->image}}" id="image" name="image">
                                                        @error('image')
                                                        <div class="alert alert-danger mt-2">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-success">EDIT</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <form method="post" action="{{route('admin.categories.destroy', $category->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
