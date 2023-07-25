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
                                <label for="description" class="form-label">Content Product</label>
                                <textarea class="form-control" name="description" id="description"
                                          placeholder="Insert Content Product"></textarea>
                                @error('description')
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
                                <label for="quantity" class="form-label">Quantity Product</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                       placeholder="Insert Quantity Product">
                                @error('quantity')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Image Product</label>
                                <input type="file" multiple="multiple" class="form-control-file" id="images" name="images[]">
                                @error('images')
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
