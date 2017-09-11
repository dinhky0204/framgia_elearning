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
                    <a href="{{route('course_user', $course->id)}}">
                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <?= $course->name ?></h3>
                                </div>
                                <ul class="list-group">
                                    <div class="box-course">
                                        <?= $course->desc ?>
                                    </div>
                                    @if(Auth::guest())
                                        <div class="btn btn-primary follow-course-btn" value ="{{$course->id}}">View more</div>
                                    @elseif($course->follow == 0)
                                        <div class="btn btn-success follow-course-btn" value ="{{$course->id}}">Follow</div>
                                    @else
                                        <div class="btn btn-danger unfollow-course-btn" value ="{{$course->id}}">Unfollow</div>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection