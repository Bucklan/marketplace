<button type="button" class="btn btn-success"
        data-toggle="modal"
        data-target=".bd-example-modal-lg"> Details
</button>

<div
    class="modal fade bd-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div
        class="modal-dialog modal-lg">
        <div
            class="modal-content">
            <section
                class="py-5">
                <div
                    class="container px-4 px-lg-5 my-5">
                    <div
                        class="row gx-4 gx-lg-5 align-items-center">
                        <div
                            class="col-md-6">
                            <img
                                class="card-img-top mb-5 mb-md-0"
                                src="{{asset($product->image)}}"
                                alt="..."/>
                        </div>
                        <div
                                class="col-md-6">
                            {{--                                                                    <p>Seller: {{$product->user->name}}</p>--}}
                            <div
                                    class="small mb-1">
                                Category: {{$product->category->name}}</div>
                            <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                            <div
                                    class="fs-5 mb-5">
                                <span>{{$product->price}} KZT</span>
                            </div>
                            <p class="lead">{{$product->content}}</p>
                            <div
                                    class="d-flex">
                                <div
                                        class="col-sm-3">
                                    <a class="btn btn-success flex-shrink-0 ml-2" href="{{route('admin.products.edit',$product->id)}}">Edit</a>
                                </div>
                                <div
                                        class="col-sm-3">
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
