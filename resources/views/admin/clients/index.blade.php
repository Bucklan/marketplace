@extends('layout.admin')

@section('title','Clients Page')

@section('content')
    <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Clients Page</h5>
                    </div>
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center">
                            @if($clients)
                                @include('admin.clients.table')
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
