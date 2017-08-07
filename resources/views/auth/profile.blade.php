@extends('layouts.app')

@section('content')

    <aside class="profile-card">
        <header>
            <!-- here’s the avatar -->
            <a target="_blank" href="#">
                <img src="http://lorempixel.com/150/150/people/" class="hoverZoomLink">
            </a>

            <!-- the username -->
            <h3>
                {{$user['name']}}
            </h3>

            <!-- and role or location -->
            <h4>
                {{$user['email']}}
            </h4>

        </header>

        <!-- bit of a bio; who are you? -->
        <div class="profile-bio">

        <span>
            Point: {{$user['point']}}
        </span>
            <hr>
        <span>
            Following: {{$following}}
        </span>
            <hr>
        <span>
            Follower: {{$follower}}
        </span>
            <hr>
        <span>
            Course: {{$course}}
        </span>
            <hr>

        </div>

        <!-- some social links to show off -->
        <a href="{{route('edit_profile')}}" class="button-profile"
           style="vertical-align:middle"><span>Edit Profile </span></a>
    </aside>
@endsection