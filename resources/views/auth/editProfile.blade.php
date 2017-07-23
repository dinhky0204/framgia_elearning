@extends('layouts.app')
@section('content')
    <div class="edit-profile-container">
        <h2 class="title">
            Update profile
        </h2>
        <div class="change-avatar">
            <img src="/avatar/{{$user['avatar']}}" alt="Choose file" class="img-circle avatar">
            <form action="{{route('profile-save')}}" method="POST" enctype="multipart/form-data">
                <ul class="change-profile">
                    <li class="">
                        <input type="file" name="avatar" id="file-1" class="inputfile inputfile-1 col-md-4 col-md-offset-4" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"> <span>Choose a file&hellip;</span></label>
                    </li>
                    <li class="row">
                        <label class="col-md-4 control-label">Name</label>
                        <input class="col-md-4 form-control profile-input" type="text" name="full-name" placeholder="Name" value="{{$user['name']}}">
                    </li>
                    <li class="row old-pass">
                        <label class="col-md-4">Old password</label>
                        <input class="col-md-4 form-control profile-input" type="password" name="old-password" placeholder="Password">
                    </li>
                    <li class="row new-pass">
                        <label class="col-md-4" for="">New Password</label>
                        <input class="col-md-4 form-control profile-input" type="password" name="new-password" placeholder="New Password">
                    </li>
                    <li class="row new-pass">
                        <label class="col-md-4">Confirm new Password</label>
                        <input class="col-md-4 form-control profile-input" type="password" name="confirm-new-password" placeholder="Confirm New Password">
                    </li>
                    <li class="row">
                        <a class="change-pass" style="cursor: pointer;">@lang('Change password?')</a>
                    </li>

                </ul>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection