@extends('layout.admin')
@section('title','Edit Manager')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h3>Edit Manager</h3>
            </div>
        </div>
        <div
            class="row">
            <div class="col-10 justify-content-center">
                <form action="{{ route('admin.managers.update',$manager->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name Manager</label>
                        <input type="text" class="form-control" value="{{$manager->name}}" id="name" name="name"
                               placeholder="Insert Name Manager">
                        @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Manager</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Insert Email Manager" value="{{$manager->email}}">
                        @error('email')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Manager</label>
                        <input type="password" class="form-control"  id="password" name="password"
                               placeholder="Insert Manager Password" value="{{$manager->password}}">
                        @error('password')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div
                        class="mb-3">
                        <label for="password_confirmation" class="form-label">Re-Password Manager</label>
                        <input type="password" class="form-control" value="{{$manager->password}}" id="password_confirmation"

                               name="password_confirmation" placeholder="Insert Password Manager">
                        @error('password_confirmation')
                        <div
                            class="alert alert-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                @foreach(App\Enums\User\Permission::asAvailableSelectArray() as $key => $value)
                        <div
                            class="form-group form-check">
                            <input type="checkbox"  name="permissions[]" {{ $manager->hasPermissionTo($key) ? 'checked' : '' }} value="{{$key}}"
                                   class="form-check-input" id="checkbox{{$value}}">
                            <label for="checkbox{{$value}}" class="form-check-label">{{$value}}</label>
                        </div>
                    @endforeach
                    @error('permissions')
                    <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                    <button class="btn btn-success">
                        Edit
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
