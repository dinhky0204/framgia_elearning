@extends('admin.layout')

@section('courses')

    <!-- Main contents -->

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3 class="fa fa-book">{{ trans('admin_courses.course-list') }}</h3>
                        </header>

                        <br>
                        <br>
                        <div>
                            @include('admin.contents.createCourse_modal')
                        </div>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="icon_profile"></i>{{ trans('admin_courses.name') }}</th>
                                <th><i class="icon_document"></i>{{ trans('admin_courses.language') }}</th>
                                <th><i class="icon_star"></i> {{ trans('admin_courses.description') }} </th>
                                <th><i class="icon_star"></i> {{ trans('admin_courses.show') }} </th>
                                <th><i class="icon_adjust-horiz"></i>{{ trans('admin_courses.edit') }}</th>
                                <th><i class="icon_cogs"></i>{{ trans('admin_courses.delete') }}</th>
                            </tr>

                            @foreach($data as $key => $element)
                            <tr>
                                <td> {{ $element->name }} </td>
                                <td> {{ $element->subject->name }} </td>
                                <td> {{ $element->desc }}</td>
                                <td>
                                    <a href="{{route('admin_show_course', $key+1)}}" class="btn btn-success">
                                        Show
                                    </a>
                                </td>
                                <td>
                                    <div>
                                        @include('admin.contents.editCourse_modal')
                                    </div>
                                </td>
                                <td>
                                    {!! Form::open(['action' => ['Admin\CourseController@deleteCourse', $element->id],
                                        'method' => 'post']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit(trans('admin_courses.delete-course'), ['class' => "btn btn-danger"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection