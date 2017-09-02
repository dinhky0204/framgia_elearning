@extends('layouts.app')

@section('content')
    <div class="profile-container">

        <div class="profile-basic">
            <img src="/avatar/{{$user['avatar']}}" alt="Avatar" class="img-circle">
            <h1 class="profile-name" style="color: #0a0a0a">{{$user['name']}}</h1>
            <h4 class="profile-email">{{$user['email']}}</h4>
            @if($status)
                {!! Form::open(['action' => ['Auth\ProfileController@followUser', $user['id']], 'method' => 'post']) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
            <div class="col-md-4 col-md-offset-4">
                {!! Form::submit('Unfollow', ['class' => "col-offset-md-9 btn btn-danger"]) !!}
            </div>

                {!! Form::close() !!}
            @else
                {!! Form::open(['action' => ['Auth\ProfileController@followUser', $user['id']], 'method' => 'post']) !!}
                <div class="col-md-4 col-md-offset-4">
                    {!! Form::submit('Follow', ['class' => "btn btn-primary"]) !!}
                </div>
                {!! Form::close() !!}
            @endif
        </div>
        <div class="profile-advance">
            <div class="box-advance">
                <h2>@lang('auth.achievement')</h2>
                <div class="info">
                    <span class="glyphicon glyphicon-fire"></span>
                    <h3>{{$point}} @lang('auth.point')</h3>
                </div>
                <div class="info">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <h3>{{$course}} @lang('auth.course')</h3>
                </div>
            </div>
        </div>

        <div class="row" style="max-width: 98%">
            <div class="bs-example col-md-4 col-md-offset-8">
                <ul class="nav nav-tabs" id="myTab">
                    <li><a data-toggle="tab" href="#sectionA" id="following">Following</a></li>
                    <li><a data-toggle="tab" href="#sectionB" id="follower">Follower</a></li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane fade in active">
                        @foreach($list_following as $value)
                            <a href="{{route('show-user', [$value['follower']])}}" class="col-md-4 user-info">
                                <img src="/avatar/{{$value['follow']['avatar']}}" alt="">
                                <span>{{$value['follow']['name']}}</span>
                            </a>
                        @endforeach
                    </div>
                    <div id="sectionB" class="tab-pane fade" style="display: block">
                        @foreach($list_follower as $value)
                            <a href="{{route('show-user', [$value['following']])}}" class="col-md-4 user-info">
                                <img src="/avatar/{{$value['follow']['avatar']}}" alt="">
                                <span>{{$value['follow']['name']}}</span>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>


    </div>




@endsection
