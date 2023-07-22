@extends('layout.home')
@section('title','Main page')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <h3 class="mb-5 text-center">Sign in</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input type="email" name="email" id="typeEmailX-2"
                                           class="form-control form-control-lg"/>
                                    @error('email')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" id="typePasswordX-2"
                                           class="form-control form-control-lg"/>
                                    @error('password')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- Checkbox -->
                                <div class="py-3">
                                    Not a member? <a href="{{route('register.form')}}">Register</a>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block mt-2" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
