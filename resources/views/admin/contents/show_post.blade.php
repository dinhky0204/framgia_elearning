@extends('admin.layout')
@section('questions')
    {{ HTML::style('/css/show_post.css') }}
    {{ HTML::script('/js/show_post.js') }}
    <div id="main-content">
        <section class="wrapper">
            @if($status = Session::get('post_edit'))
                <div class="alert alert-success">
                    {{$status}}
                </div>
            @endif
            <a href="{{route('admin_create_posts')}}" class="btn btn-success">Create new post</a>
            <div class="row">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr class="filters">
                            <th class="col-md-1"><input type="text" class="form-control" placeholder="STT" disabled></th>
                            <th class="col-md-2"><input type="text" class="form-control" placeholder="Course" disabled></th>
                            <th class="col-md-7"><input type="text" class="form-control" placeholder="Title" disabled></th>
                            <th class="col-md-1">Edit</th>
                            <th class="col-md-1">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_post as $key => $post)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$post->course_name}}</td>
                                <td>{{$post->title}}</td>
                                <td><a href="{{route('admin_edit_post', $post->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>edit</a></td>
                                <td><a href="{{route('admin_delete_post', $post->id)}}" class="btn btn-warning"><i class="glyphicon"></i>Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection