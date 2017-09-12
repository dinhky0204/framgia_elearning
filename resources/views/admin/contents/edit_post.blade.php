@extends('admin.layout')
@section('edit_post')
    <div id="main-content">
        <section class="wrapper">
            {!! Form::open((['action' => ['Admin\PostController@updatePost', $post->id], 'method' => 'post', 'files' => true])) !!}
            {{ csrf_field() }}
            <div class="col-md-6">
                <label for="post_title" class="control-label">Post title:</label>
                <textarea class="form-control" name="post_title" required>
                    {{$post->title}}
                </textarea>
            </div>

            <div class="col-md-3">
                <label for="">Create post for course:</label> <br>
                <select class="selectpicker show-tick" data-style="btn-primary"
                        name="post_course">
                    @foreach($list_course as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <img id="new-post-img"
                     src="/img/post/{{$post->image}}" alt="your image"
                     style="height: 100px; width: 100px"/>
                <input id="post-img" type='file'
                       onchange="readURL(this);" name="post_image"
                       multiple>
            </div>
        </section>
        <input id="test-post" type="hidden" value="{{$post->content}}">
        <textarea name="post_content" id="post-ckeditor-edit" cols="30" rows="30"></textarea>
        <button type="submit" class="btn btn-success col-md-offset-5" style="margin-top: 2%">Update</button>
        {!! Form::close() !!}
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var t = $("#test-post").val();
        CKEDITOR.replace( 'post-ckeditor-edit');
        CKEDITOR.instances['post-ckeditor-edit'].setData(t);
    </script>
@endsection