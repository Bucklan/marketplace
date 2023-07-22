<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".edit_category">
    Edit
</button>

<div class="modal fade edit_category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
                                <label for="name" class="form-label">Name Category</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{$category->name}}">
                                @error('name')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                                <button class="btn btn-success mt-3">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
