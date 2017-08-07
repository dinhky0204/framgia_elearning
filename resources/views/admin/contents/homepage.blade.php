@extends('admin.layout')

@section('homepage')

    <!-- Main contents -->

    <section id="main-content">

        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            {{ HTML::style('/assets/bower/bootstrap/dist/css/bootstrap.min.css') }}
            {{ HTML::script('/assets/bower/jquery/dist/jquery.min.js') }}
            {{ HTML::script('/assets/bower/bootstrap/dist/js/boottrap.min.js') }}
        </head>
        <body>

        </body>

    </section>

@endsection
