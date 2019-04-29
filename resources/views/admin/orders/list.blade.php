@if(auth()->user()->isAdmin())
    @extends('admin.master')

    @section('main-content')
        
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Orders</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Date of Order</th>
                            <th>Customer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($orders) && count($orders)>0)
                        
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        {{$order->id}}
                                    </td>
                                    <td>
                                        {{$order->created_at->format('d-m-Y H:i:s')}}
                                    </td>
                                    <td >
                                        @if(!$order->unreg_customer == null)
                                            Guest Customer
                                        @elseif(!$order->reg_customer == null)
                                            {{$order->regi_customer->name}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('adminOrders.show',$order->id)}}" class="btn btn-info btn-sm">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center text-danger">
                                    You have not palced any order yet.
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
