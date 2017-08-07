@extends('layouts.app')

@section('content')
<div class="container login-section">
    <div class="row">
        @if($login_status = Session::has('login_status'))
            <div class="col-md-8 col-md-offset-2 alert alert-info">
                {{$login_status}}
            </div>
        @endif
        @if($register_status = Session::has('register_status'))
            <div class="col-md-8 col-md-offset-2 alert alert-info">
                {{$register_status}}
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.login-title')</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'login', 'method' => 'post', 'id' => 'form-log-in', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('auth.email')</label>

                            <div class="col-md-6">
                                {!!Form::email('email', $value = old('email'), ['class' => 'form-control input-lg', 'placeholder' => 'Email'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('auth.password')</label>

                            <div class="col-md-6">
                                {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password'])!!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('auth.remember')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.sumbit-login')
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('auth.forgot-pass')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
