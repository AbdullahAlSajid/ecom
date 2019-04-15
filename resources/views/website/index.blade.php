@extends('website.master')
@section('contents')
    <section  class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="{{asset('website/themes/images/carousel/banner-1.jpg')}}" alt="" />
                </li>
                <li>
                    <img src="{{asset('website/themes/images/carousel/banner-2.jpg')}}" alt="" />
                    <div class="intro">
                        <h1>Mid season sale</h1>
                        <p><span>Up to 50% Off</span></p>
                        <p><span>On selected items online and in stores</span></p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="header_text">
        We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates.
        <br/>Don't miss to use our cheap abd best bootstrap templates.
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        @foreach($latest_products as $latest_product)
                                            <li class="span3">
                                                <div class="product-box">
                                                    <span class="sale_tag"></span>
                                                    @foreach($product_cover_images as $product_cover_image)
                                                        @if($product_cover_image->product_id == $latest_product->id)

                                                            <p><a href="{{route('website.product_details',$latest_product->id)}}"><img src="{{asset('storage/'.$product_cover_image->image)}}" alt="" /></a></p>
                                                        @endif
                                                    @endforeach
                                                    <a href="product_detail.html" class="title">{{$latest_product->name}}</a><br/>
                                                    
                                                    @foreach($latest_product->categories as $category)
                                                        <a href="products.html" class="category">{{$category->name}},</a>
                                                    @endforeach
                                                    <p class="price">{{$latest_product->price}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails">
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/ladies/5.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Know exactly</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$22.30</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/ladies/6.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                                <a href="products.html" class="category">Commodo consequat</a>
                                                <p class="price">$40.25</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/ladies/7.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">You think water</a><br/>
                                                <a href="products.html" class="category">World once</a>
                                                <p class="price">$10.45</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/ladies/8.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$35.50</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware2.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                                <a href="products.html" class="category">Commodo consequat</a>
                                                <p class="price">$25.50</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware1.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$17.55</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware6.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Know exactly turned</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$25.30</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware5.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">You think fast</a><br/>
                                                <a href="products.html" class="category">World once</a>
                                                <p class="price">$25.60</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails">
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware4.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Know exactly</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$45.50</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware3.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                                <a href="products.html" class="category">Commodo consequat</a>
                                                <p class="price">$33.50</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware2.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">You think water</a><br/>
                                                <a href="products.html" class="category">World once</a>
                                                <p class="price">$45.30</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{asset('website/themes/images/cloth/bootstrap-women-ware1.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$25.20</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row feature_box">
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">
                                <img src="{{asset('website/themes/images/feature_img_2.png')}}" alt="" />
                                <h4>MODERN <strong>DESIGN</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="customize">
                                <img src="{{asset('website/themes/images/feature_img_1.png')}}" alt="" />
                                <h4>FREE <strong>SHIPPING</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">
                                <img src="{{asset('website/themes/images/feature_img_3.png')}}" alt="" />
                                <h4>24/7 LIVE <strong>SUPPORT</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_client">
        <h4 class="title"><span class="text">Manufactures</span></h4>
        <div class="row">
            <div class="span2">
                <a href="#"><img alt="" src="{{asset('website/themes/images/clients/14.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{asset('website/themes/images/clients/35.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{asset('website/themes/images/clients/1.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{asset('website/themes/images/clients/2.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{asset('website/themes/images/clients/3.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{asset('website/themes/images/clients/4.png')}}"></a>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
    <script src="{{asset('website/themes/js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "fade",
                    slideshowSpeed: 4000,
                    animationSpeed: 600,
                    controlNav: false,
                    directionNav: true,
                    controlsContainer: ".flex-container" // the container that holds the flexslider
                });
            });
        });
    </script>
@endpush
