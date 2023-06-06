@extends('layout.home')
@section('title','Cart page')
@section('content')
    @isset($productsInCart)
        <section class="h-100 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Cart  items</h5>
                            </div>
                            <div class="card-body">
                            @foreach($productsInCart as $product)
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
                                            <form action="{{route('cart.destroyInIndex',$product->id)}}" method="post">
                                                @csrf
                                                <button class="btn btn-primary btn-sm" data-tooltip="Remove Product"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg></button>
                                            </form>
                                            <!-- Data -->
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <!-- Quantity -->
                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                <form action="{{route('cart.putToCart',$product->id)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                        </svg></button>
                                                </form>
                                                <form action="{{route('cart.destroy',$product->id)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm me-1 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                                        </svg></button>
                                                </form>
                                            </div>
                                            <!-- Quantity -->

                                            <!-- Price -->
                                            <p class="text-start text-md-center">
                                                <strong>{{$product->pivot->number}} x {{$product->price}} KZT</strong>
                                            </p>
                                            <!-- Price -->
                                        </div>
                                    </div>
                                    <!-- Single item -->

                                    <hr class="my-4"/>
                                @endforeach
                                <form action="{{route('cart.destroyAll')}}" method="post">
                                    @csrf
                                    <button class="btn btn-secondary btn-lg btn-block"><span>clear</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--                    TOTAL--}}
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                        </div>
                                        <span><strong>{{$total}} KZT</strong></span>
                                    </li>
                                </ul>
                                <form action="{{route('cart.store')}}" method="post">
                                    @csrf
                                    <button class="btn btn-primary btn-lg btn-block"><span>Checkout</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <h1 class="text-center py-lg-5">our shopping cart is empty!</h1>
    @endisset
@endsection
