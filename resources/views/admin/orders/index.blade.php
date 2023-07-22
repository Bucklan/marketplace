@extends('layout.admin')
@section('title','Order Page')
@section('content')
    <div
        class="container">
        <div
            class="row">
            <div
                class="col-12">
                <table
                    class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Seller</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$order['client']['name']}}
                                / {{$order['client']['email']}}
                            </td>
                            <td>
                                @foreach($order['products'] as $orderEach)
                                    {{$orderEach['name']}}
                                @endforeach
                            </td>
                            <td>
                                @foreach($order['products'] as $orderEach)
                                    {{$orderEach['quantity']}}
                                @endforeach
                            </td>
                            <td>
                                {{$order['amount']}}
                                KZT
                            </td>
                            <td>
                                @include('admin.orders.button-status')
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
