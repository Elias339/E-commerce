
@extends('user_template.layouts.template')

@section('main-content')
    <h1>Add To Cart</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="row">
       <div class="col-12">
           <div class="box_main">
               <div class="table-responsive">
                   <table class="table table-bordered text-center">
                       <tr>
                           <th>Product Image</th>
                           <th>Product Name</th>
                           <th>Quantity</th>
                           <th>Price</th>
                           <th>Action</th>
                       </tr>
                       @php
                       $total = 0;
                       @endphp
                       @foreach($cart_items as $item)
                           <tr>
                               @php
                                   $product_name= App\Models\Product::where('id',$item->product_id)->value('product_name');
                                   $img= App\Models\Product::where('id',$item->product_id)->value('product_img');
                               @endphp
                               <td><img src="{{ asset($img) }}" alt="img" style="height: 50px;"></td>
                               <td>{{$product_name}}</td>
                               <td>{{$item->quantity}}</td>
                               <td>{{$item->price}} Tk</td>
                               <td>
                                   <a href="{{route('removecartitem',$item->id)}}" class="btn btn-sm btn-warning">Remove</a>
                               </td>
                           </tr>
                           @php
                           $total = $total + $item->price;
                           @endphp
                       @endforeach
                       @if($total >0)
                       <tr class="bg-warning text-dark">
                           <td colspan="3"><b>Total Price</b></td>
                           <td><b>{{$total}} Tk</b></td>
                           <td class="bg-light"><a href="{{ route('shippingadderss') }}" class="btn btn-primary">Checkout Now</a></td>
                       </tr>
                       @endif
                   </table>
               </div>
           </div>
       </div>
    </div>
@endsection
