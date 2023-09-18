<table class="table" width="100%">
    <thead>
    <tr>
        <th scope="col" class="w-25">#</th>
        <th scope="col" class="w-50">Categories</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$category->name }}</td>
            <td>
                @foreach($category->getMedia('categories') as $media)
                    <div>
                        <img src="{{$media->getUrl()}}" width="368" height="232" alt="{{$media->name}}">
                    </div>
            @endforeach
            <td>
                @include('admin.categories.details')
            </td>
            <td>
                @include('admin.categories.delete')
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
