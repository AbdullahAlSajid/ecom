@extends('website.master')

@section('contents')
    <section class="header_text sub">
        <img class="pageBanner" src="{{asset('website/themes/images/pageBanner.png')}}" alt="New products" >
        <h4><span>Login or Regsiter</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span5"> 
                <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input type="hidden" name="next" value="/">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input id="email" type="email" placeholder="Enter your username" class="input-xlarge{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
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
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
                            <hr>
                            <!-- <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p> -->
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="span7">
                <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
                <form action="{{route('register')}}" method="post" class="form-stacked">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Username</label>
                            <div class="controls">
                                <!-- <input type="text" placeholder="Enter your username" class="input-xlarge"> -->
                                <input id="name" type="text" placeholder="Enter your username" class="input-xlarge{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email address:</label>
                            <div class="controls">
                                <input id="email" type="email" placeholder="Enter your email" class="input-xlarge{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password:</label>
                            <div class="controls">
                                <input id="password" type="password" placeholder="Enter your password" class="input-xlarge{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
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
                        <div class="control-group">
                            <p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
                        </div>
                        <hr>
                        <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('website/themes/js/common.js')}}"></script>
@endpush
