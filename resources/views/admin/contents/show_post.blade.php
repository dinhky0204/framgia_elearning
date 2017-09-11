@extends('admin.layout')
@section('questions')
    {{ HTML::style('/css/show_post.css') }}
    {{ HTML::script('/js/show_post.js') }}
    <div id="main-content">
        <section class="wrapper">
            <a href="{{route('admin_create_posts')}}" class="btn btn-success">Create new post</a>
            <div class="row">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr class="filters">
                            <th class="col-md-2"><input type="text" class="form-control" placeholder="STT" disabled></th>
                            <th class="col-md-4"><input type="text" class="form-control" placeholder="Course" disabled></th>
                            <th class="col-md-5"><input type="text" class="form-control" placeholder="Title" disabled></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection