@extends('layout.admin')
@section('title','Users page')
@section('content')
    <div class="container py-2">
        <div class="row d-flex  my-4">
            <div class="col-md-12">

                {{--              START  CREATE PRODUCT--}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".createProduct">Create
                    Product
                </button>

                <div class="modal fade createProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 ">
                                    <div class="col-md-12">
                                        <form action="{{route('admin.products.store')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name Product</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       placeholder="Insert Name Product">
                                                @error('name')
                                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="content" class="form-label">Content Product</label>
                                                <textarea class="form-control" name="content" id="content"
                                                          placeholder="Insert Content Product"></textarea>
                                                @error('content')
                                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price Product</label>
                                                <input type="number" class="form-control" id="price" name="price"
                                                       placeholder="Insert Price Product">
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
                                                <input type="file" class="form-control-file" id="image" name="image">
                                                @error('image')
                                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <button class="btn btn-success">CREATE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                END CREATE PRODUCT--}}

                {{--                PRODUCT ITEMS--}}
                @if($products!=null)
                    <div class="card mb-4 mt-3">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Products items</h5>
                        </div>
                        <div class="card-body">
                        @foreach($products as $product)
                            <!-- Single item -->
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
                                    <div class="justify-content-end">
                                        @if($product->comments)
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target=".qwerty">Comments
                                            </button>

                                            <div class="modal fade qwerty" tabindex="-1" role="dialog"
                                                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">comment</th>
                                                                <th scope="col">author</th>
                                                                <th scope="col">delete</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($product->comments as $comment)
                                                                <tr class="@if($comment->user->id == Auth::user()->id) text-primary @endif">
                                                                    <td>{{$comment->name}}</td>
                                                                    <td>{{$comment->user->name}}</td>
                                                                    <td>
                                                                        <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-danger">delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target=".bd-example-modal-lg">Details
                                        </button>

                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <section class="py-5">
                                                        <div class="container px-4 px-lg-5 my-5">
                                                            <div class="row gx-4 gx-lg-5 align-items-center">
                                                                <div class="col-md-6"><img
                                                                        class="card-img-top mb-5 mb-md-0"
                                                                        src="{{asset($product->image)}}"
                                                                        alt="..."/></div>
                                                                <div class="col-md-6">
                                                                    <p>Seller: {{$product->user->name}}</p>
                                                                    <div class="small mb-1">
                                                                        Category: {{$product->category->name}}</div>
                                                                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                                                                    <div class="fs-5 mb-5">
                                                                        <span>{{$product->price}} KZT</span>
                                                                    </div>
                                                                    <p class="lead">{{$product->content}}</p>
                                                                    <div class="d-flex">
                                                                        <div class="col-sm-3"><a
                                                                                class="btn btn-success flex-shrink-0 ml-2"
                                                                                href="{{route('admin.products.edit',$product->id)}}">edit</a>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <form
                                                                                action="{{route('admin.products.destroy',$product->id)}}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button
                                                                                    class="btn btn-danger flex-shrink-0">
                                                                                    delete
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single item -->

                                <hr class="my-4"/>
                            @endforeach

                        </div>
                    </div>
                @else
                    <div class="card mb-4 mt-3">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Products items not exists</h5>
                        </div>
                    </div>
                @endisset
                {{--                END PRODUCT ITEMS--}}
            </div>
        </div>
    </div>
@endsection
