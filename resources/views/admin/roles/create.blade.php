@extends('layout.admin')

@section('title','Create role page')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{route('roles.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nameInput">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="name">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
            @foreach($permissions as $permission)
                <div class="form-group form-check">
                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}" class="form-check-input" id="checkbox{{$permission->name}}">
                    <label for="checkbox{{$permission->name}}" class="form-check-label">{{$permission->name}}</label>
                </div>
            @endforeach
            <div class="form-group mt-3">
                <button type="submit" style="float:right;" class="btn btn-success">create role</button>
            </div>
        </form>
@endsection
