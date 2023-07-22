@extends('layout.admin')

@section('title','Managers Page')

@section('content')
    <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Managers Page</h5>
                    </div>
                    <div class="card-body cart">
                        <a href="{{route('admin.managers.create')}}" class="btn btn-primary">Create Manager</a>
                        <br>
                        <br>
                        <div class="col-sm-12 empty-cart-cls text-center">
                            @if($managers)
                                @include('admin.managers.table')
                            @else
                                <h3><strong>Page is Empty</strong></h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
