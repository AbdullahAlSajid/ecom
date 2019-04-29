<div class="row">
    <div class="span4">
        <form method="get" action="{{route('website.searchedProducts')}}">
            <input type="text" name="searchKey" value="{{request()->input('searchKey')}}" class="input-block-level " Placeholder="eg. T-shirt">
        </form>
    </div>
    <div class="span8">
        <div class="account pull-right">
            <ul class="user-menu">
                
                @if(auth()->user())
                    <li><a href="{{route('home')}}">My Account</a></li>
                @endif
                <li><a href="{{route('cart.getCart')}}">Your Cart
                    <span id = "totalProducts" class="badge">{{Session::has('cart') ? count(Session::get('cart')->items) : ''}}</span></a></li>
                <li><a href="{{route('website.checkout')}}">Checkout</a></li>
                @if(auth()->user())
                    <li><a href="{{route('home')}}">{{auth()->user()->name}}</a></li>
                @else
                    <li><a href="{{route('website.register')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
