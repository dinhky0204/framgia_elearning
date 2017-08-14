@extends('layouts.app')
@section('content')
<div class="container list-course-container">
    <div class="row">
        @foreach($list_course as $course)
            <a href="{{route('course_user', $course->course->id)}}">
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <?= $course->course->name ?></h3>
                        </div>
                        <ul class="list-group">
                            <div class="box-course">
                                <?= $course->course->desc ?>
                            </div>
                        </ul>

                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>


@endsection