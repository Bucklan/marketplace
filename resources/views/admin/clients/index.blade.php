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
                            @if(empty($clients))
                                @include('admin.clients.table')
                            @else
                                <x-product-card-empty name="Clients items not exists"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
