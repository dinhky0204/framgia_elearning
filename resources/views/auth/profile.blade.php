@extends('layouts.app')

@section('content')
    <div class="profile-container">
        <div class="profile-basic">
            <img src="/avatar/{{$user['avatar']}}" alt="Avatar" class="img-circle">
            <h1 class="profile-name">{{$user['name']}}</h1>
            <h4 class="profile-email">{{$user['email']}}</h4>
            <a href="{{route('edit_profile')}}" class="button-profile" style="vertical-align:middle"><span>@lang('auth.edit-profile')</span></a>
        </div>
        <div class="profile-advance">
            <div class="box-advance">
                <h2>@lang('auth.achievement')</h2>
                <div class="info">
                    <span class="glyphicon glyphicon-fire"></span>
                    <h3>{{$user['point']}} @lang('auth.point')</h3>
                </div>
                <div class="info">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <h3>{{$course}} @lang('auth.course')</h3>
                </div>
            </div>
            <div class="box-advance friend">
                <h2>@lang('auth.friend')</h2>
                <h3 class="follow">@lang('auth.following'): {{$following}}</h3>
                <h3 class="follow">@lang('auth.follower'): {{$follower}}</h3>
            </div>
        </div>
    </div>
@endsection
