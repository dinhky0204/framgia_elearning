<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{route('admin_homepage')}}">
                    <i class="icon_house_alt"></i>
                    <span>{{ trans('admin_sidebar.homepage') }}</span>
                </a>
            </li>

            <li>
                <a class="" href="{{route('admin_overview')}}">
                    <i class="icon_document_alt"></i>
                    <span>{{ trans('admin_sidebar.overview') }}</span>
                </a>
            </li>

            <li>
                <a class="" href="{{route('admin_courses')}}">
                    <i class="icon_document_alt"></i>
                    <span>{{ trans('admin_sidebar.courses') }}</span>
                </a>
            </li>


            <li>
                <a class="" href="{{route('admin_users')}}">
                    <i class="icon_document_alt"></i>
                    <span>{{ trans('admin_sidebar.users_list') }}</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_documents_alt"></i>
                    <span>Pages</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="profile.html">Profile</a></li>
                    <li><a class="" href="login.html"><span>Login Page</span></a></li>
                    <li><a class="" href="blank.html">Blank Page</a></li>
                    <li><a class="" href="404.html">404 Error</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->