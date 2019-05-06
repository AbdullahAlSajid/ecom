@extends('website.master')

@section('contents')
    <section class="header_text sub">
        <img class="pageBanner" src="{{asset('website/themes/images/pageBanner.png')}}" alt="New products" >
        <!-- <h4><span>Checkout Options</span></h4> -->
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div id="collapseOne" class="accordion-body in collapse">
                            <div class="accordion-inner">
                            <h4 class="title"><span class="text"><strong>Checkout</strong> Options</span></h4>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h4>New Customer?</h4>
                                        <hr>
                                        <h5>1) Register :</h3>
                                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                        <form action="{{route('register')}}" method="post" class="form-stacked">
                                            @csrf
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label">Username</label>
                                                    <div class="controls">
                                                        {{--<input type="text" placeholder="Enter your username" class="input-xlarge">--}}
                                                        <input id="name" type="text" placeholder="Enter your username" class="input-xlarge{{ $errors->has('nameR') ? ' is-invalid' : '' }}" name="nameR" value="{{ old('nameR') }}" required>

                                                        @if ($errors->has('nameR'))
                                                        <br>
                                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                                <strong>{{ $errors->first('nameR') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Email address:</label>
                                                    <div class="controls">
                                                        <input id="email" type="text" placeholder="Enter your email" class="input-xlarge{{ $errors->has('emailR') ? ' is-invalid' : '' }}" name="emailR" value="{{ old('emailR') }}" required>

                                                        @if ($errors->has('emailR'))
                                                        <br>
                                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                                <strong>{{ $errors->first('emailR') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Password:</label>
                                                    <div class="controls">
                                                        <input id="password" type="password" placeholder="Enter your password" class="input-xlarge{{ $errors->has('passwordR') ? ' is-invalid' : '' }}" name="passwordR" required>

                                                        @if ($errors->has('passwordR'))
                                                        <br>
                                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                                <strong>{{ $errors->first('passwordR') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Confirm Password:</label>
                                                    <div class="controls">
                                                        <input id="password-confirm" type="password" placeholder="Retype your password" class="input-xlarge" name="password_confirmation" required>
                                                    </div>
                                                </div>
                                                
                                                <hr>
                                                <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
                                            </fieldset>
                                        </form>
                                          
                                        <h5 style="padding-left:250px">Or</h5>
                                        
                                        <h5>2) Guest Checkout :</h3>
                                        <p>By checking out as a guest you won't be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p> 
                                        <hr>
                                        <a href="{{route('website.billing','guest')}}" class="btn btn-inverse">Continue</a>
                                        
                                    </div>
                                    <div class="span6">
                                        <h4>Already Registered Customer?</h4>
                                        <hr>
                                        <form action="{{ route('login','checkout') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="next" value="/">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label">Email</label>
                                                    <div class="controls">
                                                        <input id="email" type="email" placeholder="Enter your username" class="input-xlarge{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                        @if ($errors->has('email'))
                                                        <br>
                                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Password</label>
                                                    <div class="controls">
                                                        <input id="password" type="password" placeholder="Enter your password" class="input-xlarge{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                        @if ($errors->has('password'))
                                                        <br>
                                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <input tabindex="3" class="btn btn-inverse large" type="submit" value="Continiue">
                                                    <hr>
                                                    <!-- <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p> -->
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
@endpush