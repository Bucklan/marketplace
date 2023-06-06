@extends('layout.home')
@section('title','register page')
@section('content')
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                <h3 class="mb-5 text-center">Register</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                           class="form-control form-control-lg"/>
                                    @error('name')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-lg"/>
                                    @error('email')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password-2">Password</label>
                                    <input type="password" name="password" id="password"
                                           class="form-control form-control-lg"/>
                                    @error('password')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="password_confirmation">RePassword</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control form-control-lg"/>
                                </div>
                                <div class="py-3">
                                    Have already an account? <a href="{{route('login.form')}}">Login here</a>
                                </div>
                                <button class="btn btn-primary mt-2 btn-lg btn-block" >Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
