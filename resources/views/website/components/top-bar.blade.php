<div class="row">
    <div class="span4">
        <form method="POST" class="search_form">
            <input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
        </form>
    </div>
    <div class="span8">
        <div class="account pull-right">
            <ul class="user-menu">
                <li><a href="#">My Account</a></li>
                <li><a href="{{route('cart.getCart')}}">Your Cart
                    <span id = "totalProducts" class="badge">{{Session::has('cart') ? count(Session::get('cart')->items) : ''}}</span></a></li>
                <li><a href="{{route('website.checkout')}}">Checkout</a></li>
                <li><a href="{{route('website.register')}}">Login</a></li>
            </ul>
        </div>
    </div>
</div>
