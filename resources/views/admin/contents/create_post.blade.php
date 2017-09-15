@extends('admin.layout')
@section('questions')
    {!! Form::open((['action' => ['Admin\PostController@savePost'], 'method' => 'post', 'files' => true])) !!}
    {{ csrf_field() }}

    <div id="main-content">
        <section class="wrapper">
            <div class="create-post col-md-6 col-md-offset-3">
                <label for="post_title" class="control-label">Post title:</label>
                <textarea class="form-control" name="post_title" required></textarea>
                <div class="post-image">
                    <input id="post-img" type='file'
                           onchange="readURL(this);" name="post_image"
                           multiple>
                </div>
                <div class="col-md-3">
                    <select class="selectpicker show-tick post-course" data-style="btn-primary"
                            name="post_course">
                        @foreach($list_course as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>

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
    <style>
        .create-post {
            background-color: white;
            border: 1px solid #DFE2E2;
            border-radius: 3px;
            border-bottom-width: 2px;
        }
        .post-course {
            margin: 5px 5px;
            background-color: #4d90fe;
            max-width: 100px;
            right: 0;
        }
        .post-course option {
            background-color: #4d90fe;
        }
        .post-image {
            margin: 10px 5px;
            float: left;
            left: 0;
        }
     </style>
@endsection