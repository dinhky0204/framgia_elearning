@extends('layouts.app')

@section('content')
    <div class="container register-section">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.register-title')</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('auth.name')</label>

                            <div class="col-md-6">
                                {!!Form::text('name', $value = '', ['class' => 'form-control', 'placeholder' => 'Name'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('auth.email')</label>

                            <div class="col-md-6">
                                {!!Form::email('email', $value = old('email'), ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email'])!!}
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
                                {!!Form::password('password', ['class' => 'form-control', 'id' => 'password',  'placeholder' => 'Password'])!!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"
                                   class="col-md-4 control-label">@lang('auth.confirm-pass')</label>

                            <div class="col-md-6">
                                {!!Form::password('password', ['class' => 'form-control', 'id' => 'password-confirm', 'name' => 'password_confirmation', 'placeholder' => 'Password'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.register-btn')
                                </button>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
