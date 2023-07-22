@extends('layout.admin')

@section('title','Products Page')

@section('content')

    <div class="container py-2">
        <div class="row d-flex my-4">
            <div class="col-md-12">
                @include('admin.products.create')
                @if($products)
                    @include('admin.products.table')
                @else
                    <x-product-card-empty name="Products items not exists"/>
                @endif
            </div>
        </div>
    </div>

@endsection
