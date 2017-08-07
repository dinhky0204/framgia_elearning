@extends('admin.layout')

@section('general')

    <!-- Main contents -->
        <section id="main-content">
            <section class="wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop">Dashboard</i></h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Dashboard</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box blue-bg">
                            <i class="fa fa-book"></i>
                            <div class="count">4</div>
                            <div class="title">Khoá học</div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="fa fa-user"></i>
                            <div class="count">13</div>
                            <div class="title">Người dùng</div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <i class="fa fa-question"></i>
                            <div class="count">200</div>
                            <div class="title">Câu hỏi trắc nghiệm</div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <i class="fa fa-bank"></i>
                            <div class="count">1</div>
                            <div class="title">Quản trị viên</div>
                        </div>
                    </div>
                </div>

                <div class="page-content-inner">
                    <header class="entry-header gi-bold">
                        <h2 class="entry-title fa fa-anchor FontBig"> Giới thiệu chung</h2>
                        <br>
                        <br>
                    </header>

                    <div class="entry-content text-sans-serif">
                        <p style="text-align: justify;">Chào mừng các bạn đã đến với Framgia E-Learning !</p>
                        <br>
                        <p style="text-align: justify;">Đây là trang web về học ngoại ngữ. Các khoá học được thiết kế trên nền tảng web.</p>
                        <p style="text-align: justify;">Có 4 khoá học về Tiếng Anh và Tiếng Nhật.</p>
                        <br>
                        <p style="text-align: justify; text-indent: 50px">1. Tiếng Anh sơ cấp</p>
                        <p style="text-align: justify; text-indent: 50px">2. Tiếng Anh trung cấp</p>
                        <p style="text-align: justify; text-indent: 50px">3. Tiếng Nhật sơ cấp</p>
                        <p style="text-align: justify; text-indent: 50px">4. Tiếng Nhật trung cấp</p>
                    </div>

                </div>

            </section>
        </section>

@endsection