@extends('layout.admin')
@section('title','Categories Page')
@section('content')
    @include('admin.categories.create')
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
                    @include('admin.categories.edit')
                </td>
                <td>
                    @include('admin.categories.delete')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
