@extends('website.master')

@section('contents')
    <section class="header_text sub">
        <img class="pageBanner" src="{{asset('website/themes/images/pageBanner.png')}}" alt="New products" >
        <h4><span>Product Detail</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <div class="row">
                    <div class="span4">
                        @foreach($product_images as $product_image)
                            @if($product_image->cover_image == 1)
                            <a href="{{asset('storage/'.$product_image->image)}}" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{{asset('storage/'.$product_image->image)}}"></a>
                            @endif
                        @endforeach
                        <ul class="thumbnails small">
                            @foreach($product_images as $product_image)
                                @if($product_image->cover_image != 1)
                                <li class="span1">
                                    <a href="{{asset('storage/'.$product_image->image)}}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{{asset('storage/'.$product_image->image)}}" alt=""></a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="span5">
                        <address>
                            <strong>Product:</strong> <span>{{$product->name}}</span><br>
                            <strong>Product Code:</strong> <span>Product {{$product->sku}}</span><br>
                            <strong>Availability:</strong> 
                                <span>
                                @if($product->product_status_id == 1)
                                    Available
                                @elseif($product->product_status_id == 2)
                                    Out Of Stock
                                @endif
                                </span><br>
                        </address>
                        <h4><strong>Price:  {{$product->price}} Tk</strong></h4>
                    </div>
                    <div class="span5">
                        <form class="form-inline">
                            
                            <p>&nbsp;</p>
                            
                            
                            <a href="{{route('cart.add-to-cart',$product->id)}}" class="btn btn-inverse" role="button">Add to cart</a>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="span9">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#home">Description</a></li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">{{$product->description}}</div>
                        </div>
                    </div>
                    <!-- <div class="span9">
                        <br>
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel-1" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails listing-products">
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/6.jpg')}}"></a><br/>
                                                <a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
                                                <a href="#" class="category">Suspendisse aliquet</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/5.jpg')}}"></a><br/>
                                                <a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
                                                <a href="#" class="category">Phasellus consequat</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/4.jpg')}}"></a><br/>
                                                <a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
                                                <a href="#" class="category">Erat gravida</a>
                                                <p class="price">$28</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails listing-products">
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/1.jpg')}}"></a><br/>
                                                <a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
                                                <a href="#" class="category">Phasellus consequat</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/2.jpg')}}"></a><br/>
                                                <a href="product_detail.html">Praesent tempor sem</a><br/>
                                                <a href="#" class="category">Erat gravida</a>
                                                <p class="price">$28</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <a href="product_detail.html"><img alt="" src="{{asset('website/themes/images/ladies/3.jpg')}}"></a><br/>
                                                <a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
                                                <a href="#" class="category">Suspendisse aliquet</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
      
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
    <script>
        $(function () {
            $('#myTab a:first').tab('show');
            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })
        })
        $(document).ready(function() {
            $('.thumbnail').fancybox({
                openEffect  : 'none',
                closeEffect : 'none'
            });

            $('#myCarousel-2').carousel({
                interval: 2500
            });
        });
    </script>
@endpush