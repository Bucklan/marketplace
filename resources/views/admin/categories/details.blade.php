<button type="button" class="btn btn-success"
        data-toggle="modal"
        data-target=".category_details{{$category->id}}"> Details
</button>
<div
    class="modal fade category_details{{$category->id}}"
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
                            @foreach($category->getMedia('categories') as $media)
                                <div>
                                    <img class="card-img-top mb-5 mb-md-0" width="368" height="232" src="{{$media->getUrl()}}" alt="{{$category->name}}">
                                </div>
                            @endforeach
                        </div>
                        <div
                            class="col-md-6">
                            <h1 class="display-5 fw-bolder">{{$category->name}}</h1>
                            <div
                                class="d-flex">
                                <div
                                    class="col-sm-3">
                                    <a class="btn btn-success flex-shrink-0 ml-2" href="{{route('admin.categories.edit',$category->id)}}">Edit</a>
                                </div>
                                <div
                                    class="col-sm-3">
                                    <form
                                        action="{{route('admin.categories.destroy',$category->id)}}"
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
