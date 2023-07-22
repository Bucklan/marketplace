@extends('layout.admin')

@section('title','Products page')

@section('content')

    <div class="container py-2">
        <div class="row d-flex my-4">
            <div class="col-md-12">
                @include('admin.products.create')    <!-- This is assumed to be a button for creating new products -->
                @if($products)
                    @include('admin.products.index')
                @else
                    <x-product-card-empty name="Products items not exists"/>
                @endif
            </div>
        </div>
    </div>

@endsection
