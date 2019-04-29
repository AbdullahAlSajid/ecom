
<section class="navbar main-menu">  
    <div class="navbar-inner main-menu">
        <a href="{{route('website.index')}}" class="logo pull-left"><img src="{{asset('website/themes/images/logo.png')}}" class="site_logo" alt=""></a>
        <nav id="menu" class="pull-right">
            <ul>
                @foreach($categories as $category)
                    @if($category->parent_id == null)
                        <li><a href="{{route('website.categorywiseProducts',$category->id)}}">{{$category->name}}</a>
                            <ul>
                                @foreach($categories as $childcategory)
                                    @if($childcategory->parent_id == $category->id)
                                        <li><a href="{{route('website.categorywiseProducts',$childcategory->id)}}">{{$childcategory->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>    
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>

</section>