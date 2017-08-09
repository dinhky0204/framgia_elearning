@extends('layouts.app')

@section('content')
    <div class="main-container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1 course-user">
                <div class="col-md-8 col-md-offset-2 course-start">
                    <h2>Chọn một hướng đi!</h2>
                    <br>
                    <span>
                        Người mới học bắt đầu tại Cơ bản 1.
                        <br>
                        Người học nâng cao có thể làm bài kiểm tra rút ngắn.
                    </span>
                    <a class="quick-start" href="{{route('course_user', 1)}}">
                        <img src="/img/icon/house-icon.png">
                    </a>
                    <a href="{{route('course_user', 1)}}" class="quick-start-title">
                        Bài thi rút ngắn
                    </a>
                </div>

            </div>
            <div class="col-md-4 goal-container">
                <div class="col-md-10 col-md-offset-1 goal-content">
                    <h2>
                        Quá trình học
                    </h2>
                    <div class="bird row">
                        <div class="col-md-4">
                            <span><img src="/img/icon/bird-icon.png"></span>
                        </div>
                        <div class="col-md-6">
                            <span>Học một ngôn ngữ đòi hỏi một quá trình luyện tập hàng ngày.</span>
                        </div>
                    </div>
                    <div class="progress-wrap progress" data-progress-percent="25">
                        <div class="progress-bar progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
