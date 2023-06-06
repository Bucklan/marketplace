@extends('layout.home')
@section('title','Main page')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset($product->image)}}" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">Category: {{$product->category->name}}</div>
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">{{$product->price+2990}} KZT</span>
                        <span>{{$product->price}} KZT</span>
                    </div>
                    <p class="lead">{{$product->content}}</p>
                    <div class="d-flex">
                        <form action="{{route('cart.putToCart',$product->id)}}" method="post">
                            @csrf
                            <button class="btn btn-outline-dark flex-shrink-0">ADD TO CART</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <input class="form-control mr-3" type="text" name="name" placeholder="Input your comment">
            <button class="btn btn-primary ml-2">Comment</button>
        </div>
    </form>
    <!-- Related items section-->
    @if($product->comments)
        @foreach($product->comments as $comments)
            <hr>
            Author: {{$comments->user->name}} <br>
            {{$comments->name}}

            <a class="btn btn-success" href="{{route('comments.update',$comments->id)}}">EDIT</a>
            <form method="post" action="{{route('comments.destroy',$comments->id)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">DELETE</button>
            </form>
        @endforeach
    @endif
    <hr>

    <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-success">EDIT</a>
    <form action="{{route('admin.products.destroy',$product->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">DELETE</button>
    </form>
@endsection
