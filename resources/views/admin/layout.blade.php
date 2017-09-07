<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Framgia E-Learning</title>

    {{ HTML::style('/assets/bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('/assets/bower/bootstrap/dist/css/bootstrap-theme.css') }}
    {{ HTML::style('/assets/bower/elegant-icons/css/style.css') }}
    {{ HTML::style('/assets/bower/components-font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('/assets/bower/owl.carousel/dist/assets/owl.carousel.css') }}
    {{ HTML::style('/css/style.css') }}
    {{ HTML::style('/css/style-responsive.css') }}
    {{ HTML::style('/assets/bower/bootstrap-select/dist/css/bootstrap-select.min.css') }}

    {{ HTML::script('/assets/bower/jquery/dist/jquery.min.js') }}
    {{ HTML::script('/js/jquery.rateit.min.js') }}
    {{ HTML::script('/assets/bower/jquery.customSelect/jquery.customSelect.min.js') }}
    {{ HTML::script('/js/scripts.js') }}
    {{ HTML::script('/js/jquery.autosize.min.js') }}
    {{ HTML::script('/js/sparklines.js') }}
    {{ HTML::script('/js/jquery.slimscroll.min.js') }}
    {{ HTML::script('/assets/bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('/assets/bower/jquery-knob/js/jquery.knob.js') }}
    {{ HTML::script('/assets/bower/owl.carousel/dist/owl.carousel.js') }}
    {{ HTML::script('/assets/bower/jquery-ui/jquery-ui.min.js') }}
    {{ HTML::script('/assets/bower/jquery-placeholder/jquery.placeholder.min.js') }}
    {{ HTML::script('/assets/bower/bootstrap-select/dist/js/bootstrap-select.min.js') }}

</head>

<body>
<!-- container section start -->
<section id="container" class="">

    @include('admin.header.header')
    @include('admin.sidebar.sidebar')
    @yield('homepage')
    @yield('overview')
    @yield('users')
    @yield('courses')
    @yield('subjects')
    @yield('questions')
    @yield('edit_question')
    @yield('create_answer')
</section>

</body>
</html>
