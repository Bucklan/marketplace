<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".create_category">Create
    Category
</button>

<div class="modal fade create_category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 ">
                    <div class="col-md-12">
                        <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name Category</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Insert Name Category">
                                @error('name')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image Category</label>
                                    <input type="file"  class="form-control-file" id="image" name="image">
                                    @error('image')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            <button class="btn btn-success mt-4">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
