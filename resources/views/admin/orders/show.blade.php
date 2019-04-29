@if(auth()->user()->isAdmin())
    @extends('admin.master')

    @section('main-content')
        
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order Details</h4>
                <label for=""><b>Order Id : </b>{{$order->id}}</label><br>
                <label for=""><b>Order Date : </b>{{$order->created_at->format('d-m-Y H:i:s')}}</label><br>
                <label for=""><b>Customer : </b>
                    @if(!$order->unreg_customer == null)
                        Guest Customer
                    @elseif(!$order->reg_customer == null)
                        {{$order->regi_customer->name}}
                    @endif
                </label> <br>
                <label for=""><b>Billing Address : </b>{{$order->address}}</label><br>
                <label for=""><b>Phone : </b>{{$order->phone}}</label><br><br>
                <hr>
                <h4>Total : {{$total}} BDT</h4>
                <hr>
                <br><br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price (BDT)</th>
                            <th>Subtotal (BDT)</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $item)
                                @foreach($products as $product)
                                    @if($item->id == $product->id)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$item->pivot->quantity}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$item->pivot->quantity * $product->price}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
@endif
