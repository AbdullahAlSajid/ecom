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
