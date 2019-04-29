@extends('website.master')
@section('contents')
    <section class="header_text sub">
        <img class="pageBanner" src="{{asset('website/themes/images/pageBanner.png')}}" alt="New products" >
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div id="collapseOne" class="accordion-body in collapse">
                            <div class="accordion-inner">
                            <h4 class="title"><span class="text"><strong>Billing</strong> Informations</span></h4>
                            <form action="{{route('website.checkout.confirm')}}" method="get">
                                @csrf
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h4>Your Personal Details</h4>
                                        <hr>
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                            @if(auth()->user())
                                                <input type="text" placeholder="" name="name" class="input-xlarge" value="{{auth()->user()->name}}" disabled>
                                            @else
                                                <input type="text" placeholder="" name="name" class="input-xlarge">
                                            @endif 
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email Address</label>
                                            <div class="controls">
                                            @if(auth()->user())
                                            <input type="text" placeholder="" name="email" class="input-xlarge" value="{{auth()->user()->email}}" disabled>
                                            @else
                                                <input type="text" placeholder="" name="email" class="input-xlarge">
                                            @endif
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Phone</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" name="phone" class="input-xlarge">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Address</label>
                                            <div class="controls">
                                                <input type="text" placeholder="" name="address" class="input-xlarge">
                                            </div>
                                        </div>
                                    </div>
                                    <div class ="span6">
                                        <h4>Payment Methods</h4>
                                        <hr>
                                        
                                            <fieldset>
                                                <label class="radio" for="cash_on_delivery">
                                                    <input type="radio" name="cash_on_delivery" value="Cash On Delivery" id="cash_on_delivery">Cash On Delivery
                                                </label>
                                                <br>
                                                <button onclick="rem()" type="submit" class="btn btn-inverse" >Continue</button>
                                            </fieldset>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
    <script>
    function rem(e){
        $("#totalProducts").html("");
    }
    </script>
@endpush