@extends('website.master')
@section('contents')
    <section class="header_text sub">
        <img class="pageBanner" src="{{asset('website/themes/images/pageBanner.png')}}" alt="New products" >
    </section>
    <section class="filters">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line"> <strong>Filters</strong></span></span></span>               
                        </h4> 
                    </div>
                </div>
                <div class="row">
                    <div class="span12">
                        <div class="form-group">
                            <form action="{{route('website.filteredProducts')}}" method="get">
                                <select name="filter_category" id="" style="margin-right:100px">
                                    <option value="null">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                            @if($category->parent_id != null)
                                                -{{\App\Models\Category::find($category->parent_id)->name}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <select name="filter_price" id="" style="margin-right:100px">
                                    <option value="null" >Price</option>
                                    <option value="0-1000">0-1000 BDT</option>
                                    <option value="1001-2000">1001-2000 BDT</option>
                                    <option value="2001+">2001+ BDT</option>  
                                </select>
                                <input type="submit" class="btn btn-primary btn-lg" value="Filter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-content">
        <section class="filters">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text">
                            <span class="line"> 
                                Products
                                <strong>
                                @if($price == 'null')
                                    {{$clickedCategory->name}}  
                                    @if($clickedCategory->parent_id != null)
                                        - {{\App\Models\Category::find($clickedCategory->parent_id)->name}}
                                    @endif
                                @elseif($clickedCategory == 'null')
                                    Price({{$price}} BDT)
                                @else

                                @endif 
                                
                                </strong>
                            </span></span></span>               
                        </h4> 
                    </div>
                </div>
                <div class="row">
                    <div class="span9">
                    @if($price == 'null')
                        @if(count($clickedCategory->products)>0)
                            <ul class="thumbnails listing-products">                          
                                @foreach($clickedCategory->products as $product)
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
                            <h5>No product is available under this category.</h5>
                        @endif
                    @elseif($clickedCategory == 'null')
                        @if(count($priceFilteredProducts)>0)
                            <ul class="thumbnails listing-products">
                                @foreach($priceFilteredProducts as $product)
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
                                            <p class="price">{{$product->price}}</p>
                                        </div>
                                    </li>    
                                @endforeach
                            </ul>
                        @else
                            <h5>No product is available under this price range.</h5>
                        @endif
                    @elseif($price != 'null' && $clickedCategory != 'null')
                        @if(count($clickedCategory->products)>0)
                            <ul class="thumbnails listing-products">
                                @php($i=0)                          
                                @foreach($clickedCategory->products as $product)
                                    
                                    @if($maxPrice != null)
                                        @if($product->price >= $minPrice && $product->price <= $maxPrice)
                                            <li class="span3">
                                                <div class="product-box">
                                                @php($i++)
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
                                        @endif
                                    @else
                                        @if($product->price >= $minPrice)
                                            <li class="span3">
                                                <div class="product-box">
                                                @php($i++)
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
                                        @endif
                                    @endif 
                                @endforeach
                            </ul>
                            @if($i == 0)
                                <h5>No product is available with this filters.</h5>
                            @endif
                        @else
                            <h5>No product is available with this filterssss.</h5>
                        @endif
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
