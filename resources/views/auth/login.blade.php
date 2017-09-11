@extends('layouts.app')

@section('content')
    {{ HTML::style('/css/login.css') }}
    @if($status = Session::get('checkmail'))
        <div class="checkmail-flash">
            {{$status}}
        </div>
    @endif
    <section id="hero1" class="hero">
        <div class="inner">
            <div class="form">

                <ul class="tab-group">
                    <li class="tab active"><a href="#login">Log In</a></li>
                    <li class="tab"><a href="#signup">Sign Up</a></li>
                </ul>

                <div class="tab-content">
                    <div id="login">
                        <h1>Welcome Back!</h1>

                        {!! Form::open(['route' => 'login', 'method' => 'post', 'id' => 'form-log-in', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                        <div class="field-wrap">
                            <label>
                                Email Address<span class="req">*</span>
                            </label>
                            {!!Form::email('email', $value = old('email'), ['required autocomplete' => 'off'])!!}
                        </div>

                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            {!!Form::password('password', ['required autocomplete' => 'off'])!!}
                        </div>
                        <p class="forgot"><a href="{{ route('resetpassword') }}">Forgot Password?</a></p>

                        <button class="button button-block"/>Log In</button>

                        {!! Form::close() !!}

                    </div>
                    <div id="signup">
                        <h1>Sign Up for Free</h1>

                        {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}


                        <div class="field-wrap">
                            <label>
                                Full Name<span class="req">*</span>
                            </label>
                            {!!Form::text('name', "")!!}
                        </div>
                        <div class="field-wrap">
                            <label>
                                Email Address<span class="req">*</span>
                            </label>
                            {!!Form::email('email', "", ['id' => 'email'])!!}
                        </div>

                        <div class="field-wrap">
                            <label>
                                Set A Password<span class="req">*</span>
                            </label>
                            {!!Form::password('password', ['required autocomplete' => 'off'])!!}
                        </div>
                        <div class="field-wrap">
                            <label>
                                Confirm password<span class="req">*</span>
                            </label>
                            {!!Form::password('password', ['name' => 'password_confirmation', 'required autocomplete' => 'off'])!!}
                        </div>

                        <button type="submit" class="button button-block"/>Get Started</button>

                        {!! Form::close() !!}

                    </div>

                </div><!-- tab-content -->

            </div>
        </div>
    </section>

@endsection
