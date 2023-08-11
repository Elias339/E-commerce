@extends('admin.layouts.template')
@section('page_title')
    Pending orders
@endsection
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Pending orders</h4>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">Pending orders Information</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>User Id</th>
                        <th>Shipping Information</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total Will Pay</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    @foreach($pending_orders as $order)
                        <tr>
                            <td>{{$order->user_id}}</td>
                            <td>
                                <ul>
                                    <li>Phone Number: {{$order->shipping_phonenumber}}</li>
                                    <li>City: {{$order->shipping_city}}</li>
                                    <li>Postal Code: {{$order->shipping_postalcode}}</li>
                                </ul>
                            </td>
                            <td>{{$order->product_id}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->total_price}}</td>
                            <td><a href="" class="btn btn-info">Confirm Order</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
