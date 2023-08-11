@extends('admin.layouts.template')
@section('page_title')
    All Category
@endsection
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Available Category Information</h5>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Sub Category</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->subcategory_count }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="btn-group ">
                            <a href="{{ route('editcategory',$category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('deletecategory') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $category->id }}" name="category_id">
                                <button class="btn btn-danger ms-1">Delete</button>
                            </form>
{{--                            <a href="" class="btn btn-danger">Delete</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
