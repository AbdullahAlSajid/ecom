@if(auth()->user()->isAdmin())
    @extends('admin.master')

    @section('main-content')
        <div class="container">
            <a href="{{route('adminProducts.create')}}" class="btn btn-success btn-fw">+ Add New Product</a>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Categories</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( !empty($products) && count($products))
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                    <td>
                                        @if($product->status = 1)
                                            {{ "In stock" }}
                                        @else
                                            {{ "Out of stock" }}
                                        @endif
                                    </td>
                                    <td >
                                        @foreach($product->categories as $category)
                                            <span class="badge badge-inverse-dark">{{$category->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$product->price}} tk
                                    </td>
                                    <td>
                                        <a href="{{route('adminProducts.edit',$product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('adminProducts.show',$product->id)}}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{route('adminProducts.delete',$product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center text-danger">
                                    No data found
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
@endif
