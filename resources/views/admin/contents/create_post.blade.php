@extends('admin.layout')
@section('questions')
    {!! Form::open((['action' => ['Admin\PostController@savePost'], 'method' => 'post', 'files' => true])) !!}
    {{ csrf_field() }}

    <div id="main-content">
        <section class="wrapper">
            <div class="col-md-6 form-group">
                <input id="new-answer" type='file'
                       onchange="readURL(this);" name="answer-desc"
                       multiple>
                <img id="new-answer-img"
                     src="/img/answer_image/default.jpg" alt="your image"
                     style="height: 100px; width: 100px"/>
            </div>
            <label for="">Create post fo course:</label> <br>
            <select class="selectpicker show-tick" data-style="btn-primary"
                    name="post_course">
                @foreach($list_course as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </section>
        <textarea name="post_content" id="post-ckeditor" cols="30" rows="20"></textarea>
        <button type="submit" class="btn btn-success col-md-offset-5" style="margin-top: 2%">Submit</button>
    </div>

    {!! Form::close()!!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'post-ckeditor' );
    </script>
@endsection