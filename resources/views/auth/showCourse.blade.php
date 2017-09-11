@extends('layouts.app')
@section('content')
{{ HTML::script('/assets/bower/jquery/dist/jquery.min.js') }}
{{ HTML::script('js/progress.js') }}
    <div class="exam-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 exam-content">
                <div class="col-md-8">
                    <div class="course-title">
                        {{$course['name']}}
                    </div>
                    <div class="course-desc">
                        {{$course['desc']}}
                    </div>
                    <div class="total-question">
                        Tổng số câu hỏi: {{$course['total_question']}}
                    </div>
                </div>
                <div class="dol-md-4 progress-pie-chart" data-percent="{{$progress}}">
                    <div class="ppc-progress">
                        <div class="ppc-progress-fill"></div>
                    </div>
                    <div class="ppc-percents">
                        <div class="pcc-percents-wrapper">
                            <span>%</span>
                        </div>
                    </div>
                </div>
                @if($active == 1)
                    <div class="btn-group col-md-12" >
                        <a href="{{route('test_course', $course->id)}}" class="col-md-2 col-md-offset-3 btn btn-primary">Làm bài kiểm tra</a>
                        <a href="{{route('learn_course', $course->id)}}" class="col-md-1 col-md-offset-6 btn btn-success">Học</a>
                        <a href="{{route('posts_of_course', $course->id)}}" class="col-md-2 col-md-offset-6 btn btn-warning">Xem bài viết</a>
                    </div>

                @elseif(Auth::guest())
                    <a href="{{route('login')}}" class="col-md-4 col-md-offset-3 btn btn-warning">Đăng nhập để tham gia khóa học</a>
                @else
                    <a href="#" class="col-md-4 col-md-offset-3 btn btn-danger">Bạn chưa đăng ký khóa học này</a>
                @endif
                <h3 class="col-md-4 col-md-offset-8">Số câu đúng:{{$correct}}</h3>
            </div>
        </div>
    </div>
@endsection
