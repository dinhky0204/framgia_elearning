@extends('layouts.app')
@section('content')
    <div class="edit-profile-container">
        <h2 class="title">
            @lang('auth.update-profile')
        </h2>
        <div class="change-avatar">
            <img src="/avatar/{{$user['avatar']}}" alt="Choose file" class="img-circle avatar">
            {!! Form::open(['route' => 'profile-save', 'method' => 'post', 'files' => true]) !!}
            {{ csrf_field() }}
            <ul class="change-profile">
                <li class="">
                    <input type="file" name="avatar" id="file-1" class="inputfile inputfile-1 col-md-4 col-md-offset-4" data-multiple-caption="{count} files selected" multiple />
                    <label for="file-1"> <span>Choose a file&hellip;</span></label>
                </li>
                <li class="row">
                    <label class="col-md-4">@lang('auth.email')</label>
                    {!!Form::email('user-email', $value = $user['email'], ['class' => 'col-md-4 form-control profile-input', 'disabled' => 'disabled'])!!}
                </li>
                <li class="row">
                    <label class="col-md-4 control-label">@lang('auth.name')</label>
                    {!! Form::text('full-name', $user['name'], ['class' => 'col-md-4 form-control profile-input', "placeholder" => "Name"]) !!}
                </li>
                <li class="row old-pass">
                    <label class="col-md-4">@lang('auth.old-password')</label>
                    {!! Form::password("old-password", ["class" => "col-md-4 form-control profile-input", "placeholder" => "Password"]) !!}
                </li>
                <li class="row new-pass">
                    <label class="col-md-4" for="">@lang('auth.new-password')</label>
                    {!! Form::password("new-password", ["class" => "col-md-4 form-control profile-input", "placeholder" => "New Password"]) !!}
                </li>
                <li class="row new-pass">
                    <label class="col-md-4">@lang('auth.confirm-new-pass')</label>
                    {!! Form::password("confirm-new-password", ["class" => "col-md-4 form-control profile-input", "placeholder" => "Confirm New Password"]) !!}
                </li>
                <li class="row">
                    <a class="change-pass" style="cursor: pointer;">@lang('Change password?')</a>
                </li>

            </ul>
            <input type="submit" class="btn btn-primary">
            {!!Form::close()!!}
        </div>
    </div>
@endsection
