<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <!-- <div class="card text-center">
        <div class="card-header" style="background:#f2460d; margin-top:30px">
            <b style="">Invoice</b>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div> -->

    <div class="row" style="background: #f2460d;margin-top:50px;">

        <div class="col-md-6"><h3 style="color:#fff">Shopper</h3></div>
        <div class="col-md-6"><h3 style="color:#fff;text-align:right;">Invoice</h3></div>

    </div>


    <!-- <h4 style="margin-top: 30px;">Road 14, Nikunjha 2, Khilkhet <br><br>Dhaka<h4> -->
    <br>
    <div class="col-xs-12 invoice-header">
        <h4>
            Road 14, Nikunjha 2, Khilkhet  
            <strong class="pull-right">{{Carbon\Carbon::now()->toDateTimeString()}}</strong>
            <br><br>Dhaka
        </h4>
    </div>

    <br><br><br><br><br><br>
    <section class="main-page container">
    <div class="main-container col1-layout">
        <div class="main">
            <div class="col-main">
                <div class="x_panel">

                    <div class="x_content">

                        <section class="content invoice">
                            <!-- title row -->
                            
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address style="margin-right:20px">
                                        <h4><strong>Bill To</strong></h4>
                                        @if(auth()->user())
                                            @if(auth()->user()->isCustomer())
                                            <p style="text-transform: capitalize">
                                                {{$order->regi_customer()->first()->name}}
                                                <br>
                                                {{$order->regi_customer()->first()->email}}
                                            </p>
                                            @endif
                                        @elseif(!auth()->user())
                                        <p style="text-transform: capitalize">
                                            {{$order->unregi_customer()->first()->name}}
                                            <br>
                                            {{$order->unregi_customer()->first()->email}}
                                        </p>
                                        @endif
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">

                                    <address style="margin-left:50px">
                                        <h4><strong>Billing Address</strong></h4>
                                            {{$order->address}}
                                            <br>
                                            {{$order->phone}}
                                            <br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <h4 class="pull-right" style="margin-right:20px"><strong>Invoice # </strong>{{$order->id}}</h4>
                                    <br>
                                    <br>
                                    <h3 class="pull-right" style="margin-right:20px"><strong>Invoice Total : </strong>
                                    {{$total}}
                                    </h3>
                                    
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-xs-12 table">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            @foreach($products as $product)
                                                @if($item['item']->id == $product->id)
                                                <tr>
                                                <td>{{$product->name}}</td>
                                                <td>{{$item['qty']}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$item['qty'] * $product->price}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-2 col-md-7">


                                </div>
                                <!-- /.col -->
                                <div class="col-xs-8 col-md-5">
                                    <h3>Total Amount</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>{{$total}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax</th>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{$total}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                        </section>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




</body>
</html>