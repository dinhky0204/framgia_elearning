@extends('layouts.app')
@section('content')
    <div class="container list-course-container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            List language</h3>
                    </div>
                    <ul class="list-group">
                        @foreach($subjects as $subject)
                            @if($subject['id'] == $subject_id)
                                <a href="{{route('list_course', $subject['id'])}}" class="list-group-item active"><?= $subject['name']?></a>
                            @else
                                <a href="{{route('list_course', $subject['id'])}}" class="list-group-item"><?= $subject['name']?></a>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1 course-container">
                @foreach($this_subject->courses as $course)
                    <div>
                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <a href="{{route('course_user', $course->id)}}">
                                    <h3 class="panel-title">
                                        <?= $course->name ?></h3>
                                        </a>
                                </div>
                                <ul class="list-group">
                                    <div class="box-course">
                                        <?= $course->desc ?>
                                    </div>
                                    @if(Auth::guest())
                                        <a href="#" class="btn btn-primary follow-course-btn" value ="{{$course->id}}">View more</a>
                                    @elseif($course->follow == 0)
                                        <a href="{{route('follow_course', $course->id)}}" class="btn btn-success follow-course-btn" value ="{{$course->id}}">Follow</a>
                                    @else
                                        <a href="{{route('unfollow_course', $course->id)}}" class="btn btn-danger unfollow-course-btn" value ="{{$course->id}}">Unfollow</a>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection