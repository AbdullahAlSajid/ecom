@extends('website.master')

@section('contents')
    <br>
    <section class="main-content">
        <section class="filters">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text">
                            <span class="line"> 
                                Search Results
                                <strong>
                                @if($searchedTag)
                                    ({{count($searchedTag->products)}} products found for '{{$searchKey}}')
                                @else
                                    (0 products found for '{{$searchKey}}')
                                @endif
                                </strong>
                            </span></span></span>               
                        </h4> 
                    </div>
                </div>
                <div class="row">						
					<div class="span9">
                        @if($searchedTag)
                            @if(count($searchedTag->products)>0)
                                <ul class="thumbnails listing-products">                    
                                    @foreach($searchedTag->products as $product)
                                        <li class="span3">
                                            <div class="product-box">
                                                @foreach($product_cover_images as $product_cover_image)
                                                    @if($product_cover_image->product_id == $product->id)
                                                        <p><a href="{{route('website.product_details',$product->id)}}"><img src="{{asset('storage/'.$product_cover_image->image)}}" alt="" /></a></p>
                                                    @endif
                                                @endforeach
                                                <a href="product_detail.html" class="title">{{$product->name}}</a><br/>
                                                @foreach($product->categories as $category)
                                                    <a href="products.html" class="category">{{$category->name}},</a>
                                                @endforeach
                                                <p class="price">BDT {{$product->price}}</p>
                                            </div>
                                        </li>    
                                    @endforeach
                                </ul>
                            @else
                                <h5>No product is available under this Search Key.</h5>
                            @endif
                        @else
                            <h5>No product is available under this Search Key.</h5>
                        @endif   
                        <hr>    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
@endpush
