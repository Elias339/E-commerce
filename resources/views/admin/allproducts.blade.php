@extends('admin.layouts.template')
@section('page_title')
    All Product
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
         @endif
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">Available Product Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($products as $key=>$product)
                     <tr>
                         <td>{{++$key}}</td>
                         <td>{{$product->product_name}}</td>
                         <td>
                             <img style="height: 50px;" src="{{asset($product->product_img)}}" alt="Image">
                             <br>
                             <a href="{{route('editproductimg',$product->id)}}" class="btn btn-primary">Update Image</a>
                         </td>
                         <td>{{$product->price}}</td>
                         <td>
                             <a href="{{route('editproduct',$product->id)}}" class="btn btn-primary">Edit</a>
                             <a href="{{route('deleteproduct',$product->id)}}" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
