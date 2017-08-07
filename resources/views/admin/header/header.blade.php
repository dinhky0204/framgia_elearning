<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="{{ route('admin_homepage') }}" class="logo">{{ trans('admin_header.framgia') }}<span class="lite">{{ trans('admin_header.e-learning') }}</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                    <span class="username">#</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="#"><i class="icon_profile"></i>{{ trans('admin_header.my-profile') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon_mail_alt"></i>{{ trans('admin_header.my-inbox') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon_clock_alt"></i>{{ trans('admin_header.timeline') }}</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="icon_key_alt"></i>{{ trans('admin_header.logout') }}</a>
                    </li>

                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>
<!--header end-->
