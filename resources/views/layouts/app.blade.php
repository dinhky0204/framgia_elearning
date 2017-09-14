<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/login.css') }}" rel="stylesheet">--}}
</head>
<body>
<div class="page-container">
    <header>
        <div class="container">
            <a href="{{route('welcome')}}" class="site-logo">
                <i class="gi gi-flash"></i> <strong>E-Learning</strong>
            </a>
            <nav>
                <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                    <i class="fa fa-bars"></i>
                </a>
                <ul class="site-nav">
                    <li class="visible-xs visible-sm">
                        <a href="javascript:void(0)" class="site-menu-toggle text-center">
                            <i class="fa fa-times"></i>
                        </a>
                    </li>
                    <li class="nav-bar-item">
                        <a href="{{route('home')}}">
                            Home
                        </a>
                    </li>
                    <li class="nav-bar-item">
                        <a href="{{route('list_course', 1)}}">COURSE</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="site-nav-sub"><i
                                    class="fa fa-angle-down site-nav-arrow"></i>@lang('auth.language')</a>
                        <ul>
                            <li>
                                <a href="#">English</a>
                            </li>
                            <li>
                                <a href="#">Tiếng Việt</a>
                            </li>
                        </ul>
                    </li>

                    @if (Auth::guest())
                        <li>
                            <a href="{{route('login')}}" class="btn btn-primary">Log In/Sign up</a>
                        </li>
                    @else
                        <input id="user_info" type="hidden" value = "{{Auth::user()->id}}">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <img src="/avatar/{{Auth::user()->avatar}}" alt="" style="width:32px; height: 32px; border-radius: 50%;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('show_profile') }}">
                                        <i class="fa fa-btn fa-user">
                                            Profile
                                        </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-btn fa-sign-out">
                                            Logout
                                        </i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="dropdown dropdown-notifi">
                                <div class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="notification-total" id="app_{{Auth::user()->id}}">{{$total_notification}}</span>
                                    <span class="glyphicon glyphicon-bell"></span>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-notifi" style="width: auto!important;">

                                </ul>
                            </div>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </header>

    @yield('content')
    @yield('auth.user')
    @yield('slider')
    @yield('posts')
    @yield('show_post')
</div>
<footer class="footer-distributed">

    <div class="footer-left">

        <h3>E<span>Learning</span></h3>
        <img src="/img/slider/elearning-logo.png" alt="" width="200" height="40">
        <p class="footer-company-name">Framgia E-learning &copy; 2017</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Tran Khat Chan</span> Ha Noi, Viet Nam</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+84 01649566609</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">elearning_support@company.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>Về E-Learning</span>
            Elearning học với bạn, bạn sẽ thấy rất hài hước và hấp dẫn. Dành nhiều thời điểm từ các câu trả lời đúng, trả lời một cách nhanh chóng trước khi thời gian chạy ra ngoài hoặc cấp độ tiếp theo. bài học nhỏ gọn của chúng tôi rất hiệu quả cho tất cả mọi người
        </p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>

</footer>

<!-- Scripts -->
<script src="{{ asset('assets/bower/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>
<script src="{{ asset('js/notification.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{ HTML::script('/js/test_course.js') }}
<script>
    var user = <?php echo Auth::user() ?> ;
    Echo.channel('notification')
            .listen('MessageSent', (e) => {
            $("#app_" + e.user_id).text(parseInt($("#app_" + (e.user_id)).text()) + 1);
        });

</script>
</body>
</html>
