@extends('user_template.layouts.template')

@section('main-content')
    <h1>Final Step To Place Your Order</h1>

    <div class="row">
        <div class="col-8">
            <div class="box_main">
                <h3>Product Will Send At-</h3>
                <p>City/Village: {{$shipping_address->city_name}}</p>
                <p>Postal Code: {{$shipping_address->postal_code}}</p>
                <p>Phone Number: {{$shipping_address->phone_number}}</p>
            </div>
        </div>
        <div class="col-4">
            <div class="box_main">
                Your Final Products Are-
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>

                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($cart_items as $item)
                            <tr>
                                @php
                                    $product_name= App\Models\Product::where('id',$item->product_id)->value('product_name');
                                @endphp

                                <td>{{$product_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}} Tk</td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                            <tr class="bg-warning text-dark">
                                <td><b>Total Price</b></td>
                                <td colspan="2"><b>{{$total}} Tk</b></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>

        <form action="" method="post">
            @csrf
            <input type="submit" value="Cancel Order" class="btn btn-danger mr-5">
        </form>

        <form action="{{route('placeorder')}}" method="post">
            @csrf
            <input type="submit" value="Place Order" class="btn btn-primary ">
        </form>

    </div>
@endsection
