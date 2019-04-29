@extends('website.master')

@section('contents')
    <section class="header_text sub">
        <img class="pageBanner" src="{{asset('website/themes/images/pageBanner.png')}}" alt="New products" >
        <h4><span>Shopping Cart</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price(BDT)</th>
                        <th>Total(BDT)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('cart'))
                        @foreach($products->items as $product)
                            <tr id="pd{{$product['item']->id}}">
                                <td><img onclick="rem(this)" id="pdRem{{$product['item']->id}}" style="height:20px"src="{{asset('website/bootstrap/img/x.png')}}" alt=""></td>
                                <td>
                                    @foreach($product_cover_images as $product_cover_image)
                                        @if($product_cover_image->product_id == $product['item']->id)
                                                <a href=""><img style="width: 150px;height: 180px;" src="{{asset('storage/'.$product_cover_image->image)}}" alt="" /></a>
                                            @endif
                                    @endforeach
                                </td>
                                <td>{{$product['item']->name}}</td>
                                <td><input onchange="inc(this)" id="pdQ{{$product['item']->id}}" type="number" min="1" value="{{$product['qty']}}" class="input-mini"></td>
                                <td id="pdU{{$product['item']->id}}">{{$product['price']/$product['qty']}}</td>
                                <td id="pdT{{$product['item']->id}}">{{$product['price']}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><strong id="totalPrice">{{$products->totalPrice}}</strong></td>
                        </tr>
                    @endif
                    
                    </tbody>
                </table>
                <!-- <h4>What would you like to do next?</h4>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                    Use Coupon Code
                </label>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Estimate Shipping &amp; Taxes
                </label> -->
                <hr>
                <p class="cart-total right">
                    <strong>Sub-Total : </strong>
                    <strong id="subTotalList" >
                        @if(Session::has('cart'))
                            {{$products->totalPrice}}
                        @else
                            00
                        @endif
                    </strong>
                    <strong> BDT</strong><br>
                    <strong>Eco Tax : 00 BDT</strong><br>
                    <strong>VAT : 00 BDT</strong><br>
                    <strong>Total : </strong>
                    <strong id="totalPriceList">
                        @if(Session::has('cart'))
                            {{$products->totalPrice}}
                        @else
                            00
                        @endif 
                    </strong>
                    <strong> BDT</strong><br>
                </p>
                <hr/>
                <p class="buttons center">
                    <!-- <button class="btn" type="button">Update</button> -->
                    <!-- <button class="btn" type="button">Continue</button> -->
                    <!-- <button class="btn btn-inverse" type="submit" id="checkout">Checkout</button> -->
                    <a href="" class="btn">Continue</a>
                    <a href="{{route('website.checkout')}}" class="btn btn-inverse">Checkout</a>
                    
                </p>
            </div>
            <div class="span3 col">
                <!-- <div class="block">
                    <ul class="nav nav-list">
                        <li class="nav-header">SUB CATEGORIES</li>
                        <li><a href="products.html">Nullam semper elementum</a></li>
                        <li class="active"><a href="products.html">Phasellus ultricies</a></li>
                        <li><a href="products.html">Donec laoreet dui</a></li>
                        <li><a href="products.html">Nullam semper elementum</a></li>
                        <li><a href="products.html">Phasellus ultricies</a></li>
                        <li><a href="products.html">Donec laoreet dui</a></li>
                    </ul>
                    <br/>
                    <ul class="nav nav-list below">
                        <li class="nav-header">MANUFACTURES</li>
                        <li><a href="products.html">Adidas</a></li>
                        <li><a href="products.html">Nike</a></li>
                        <li><a href="products.html">Dunlop</a></li>
                        <li><a href="products.html">Yamaha</a></li>
                    </ul>
                </div>
                <div class="block">
                    <h4 class="title">
                        <span class="pull-left"><span class="text">Randomize</span></span>
                        <span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
                    </h4>
                    <div id="myCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails listing-products">
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/2.jpg')}}"></a><br/>
                                            <a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
                                            <a href="#" class="category">Suspendisse aliquet</a>
                                            <p class="price">$261</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="thumbnails listing-products">
                                    <li class="span3">
                                        <div class="product-box">
                                            <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/4.jpg')}}"></a><br/>
                                            <a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
                                            <a href="#" class="category">Urna nec lectus mollis</a>
                                            <p class="price">$134</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#checkout').click(function (e) {
                document.location.href = "checkout.html";
            })
        });
    </script>

<script>
$.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
        });


        function inc(e){
            var id = $(e).attr("id");
            var quantity = $(e).val();
            //get only product id
            id = id.substring(3);
            var unitP = $("#pdU"+id).html();
            var totalP = $("#totalPrice").html();

            $.ajax({
               type: 'GET',
                url: '/cart/update/'+id+'/'+quantity,
                success:function (data) {
                    
                    $("#pdT"+id).html(quantity * unitP);
                    $("#totalPrice").html(data);
                    $("#totalPriceList").html(data);
                    $("#subTotalList").html(data);
                }
            });
        }

        function rem(e){
            var id = $(e).attr("id");
            id = id.substring(5);
            var unitP = $("#pdU"+id).html();
            var unitT = $("#pdT"+id).html();
            var totalProducts = $("#totalProducts").html();
            
            $.ajax({
               type: 'GET',
                url: '/cart/remove/'+id,
                success:function (data) {
                    $("#pd"+id).remove();
                    $("#totalPrice").html(data);
                    $("#totalPriceList").html(data);
                    $("#subTotalList").html(data);
                    $("#totalProducts").html(totalProducts -1);
                }
            });
        }

       
            
       
        
    </script>





@endpush