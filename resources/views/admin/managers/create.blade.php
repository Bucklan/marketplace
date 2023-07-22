@extends('layout.admin')
@section('title','Create Manager')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h3>Create Manager</h3>
            </div>
        </div>
        <div
            class="row">
            <div class="col-10 justify-content-center">
                <form action="{{route('admin.managers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name Manager</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Insert Name Manager">
                        @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Manager</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Insert Email Manager">
                        @error('email')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Manager</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Insert Password Manager">
                        @error('password')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div
                        class="mb-3">
                        <label for="password_confirmation" class="form-label">Re-Password Manager</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Insert Password Manager">
                        @error('password_confirmation')
                        <div
                            class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    @foreach(App\Enums\User\Permission::asAvailableSelectArray() as $key => $value)
                        <div
                            class="form-group form-check">
                            <input type="checkbox" name="permissions[]" value="{{$key}}"
                                class="form-check-input" id="checkbox{{$value}}">
                            <label for="checkbox{{$value}}" class="form-check-label">{{$value}}</label>
                        </div>
                    @endforeach
                    @error('permissions')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    <button class="btn btn-success">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
