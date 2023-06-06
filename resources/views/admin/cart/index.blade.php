@extends('layout.admin')
@section('title','Cart page')
@section('content')
    <h1>Cart page </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Name Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total price</th>
            <th scope="col">Confirm</th>

        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($productsInCart);$i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$productsInCart[$i]->product->user->name}}</td>
                <td>{{$productsInCart[$i]->product->name}}</td>

                <td>{{$productsInCart[$i]->number}}</td>
                <td>{{$productsInCart[$i]->number*$productsInCart[$i]->product->price}} KZT</td>

                <td>
                    <form action="{{route('admin.cart.confirm',$productsInCart[$i]->id)}}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.cart.decline',$productsInCart[$i]->id)}}" >
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-secondary">Decline</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
