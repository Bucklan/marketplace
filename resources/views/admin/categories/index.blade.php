@extends('layout.admin')
@section('title','Categories Page')
@section('content')
    <div class="container py-2">
        <div class="row d-flex">
            <div class="col-md-12">
                @include('admin.categories.create')
                @if($categories)
                    @include('admin.categories.table')
                @else
                    <x-product-card-empty name="Categories items not exists"/>
                @endif
            </div>
        </div>
    </div>
@endsection
