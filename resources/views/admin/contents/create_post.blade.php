@extends('admin.layout')
@section('questions')
    {!! Form::open((['action' => ['Admin\PostController@savePost'], 'method' => 'post', 'files' => true])) !!}
    {{ csrf_field() }}

    <div id="main-content">
        <section class="wrapper">
            <div class="col-md-6">
                <label for="post_title" class="control-label">Post title:</label>
                <textarea class="form-control" name="post_title" required></textarea>
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
                     src="/img/post/book.jpg" alt="your image"
                     style="height: 100px; width: 100px"/>
                <input id="post-img" type='file'
                       onchange="readURL(this);" name="post_image"
                       multiple>
            </div>

        </section>
        <label for="">Post Content</label>
        <textarea name="post_content" id="post-ckeditor" cols="30" rows="20"></textarea>
        <button type="submit" class="btn btn-success col-md-offset-5" style="margin-top: 2%">Create</button>
    </div>

    {!! Form::close()!!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'post-ckeditor');
    </script>
@endsection