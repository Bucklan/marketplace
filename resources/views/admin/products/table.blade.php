<div class="card mb-4 mt-3">
    <div class="card-header py-3">
        <h5 class="mb-0">Products items</h5>
    </div>
    <div class="card-body">
        @foreach($products as $product)
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
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <p><strong>{{$product->name}}</strong></p>
                    <p>{{$product->content}}</p>
                    <p>Category: {{$product->category->name}}</p>
                </div>
                <div class="justify-content-end">
                    @include('admin.products.details')
                </div>
            </div>
            <!-- Single item -->

            <hr class="my-4"/>
        @endforeach

    </div>
</div>
