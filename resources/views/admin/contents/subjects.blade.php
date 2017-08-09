@extends('admin.layout')

@section('subjects')

    <!-- Main contents -->

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3 class="fa fa-book">{{ trans('admin_subjects.subject-list') }}</h3>
                        </header>

                        <br>
                        <br>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="icon_profile"></i>{{ trans('admin_subjects.name') }}</th>
                                <th><i class="icon_star"></i> {{ trans('admin_subjects.description') }} </th>
                                <th><i class="icon_adjust-horiz"></i>{{ trans('admin_subjects.edit') }}</th>
                                <th><i class="icon_cogs"></i>{{ trans('admin_subjects.delete') }}</th>
                            </tr>

                            @foreach($data as $element)

                                <tr>
                                    <td> {{ $element->name }} </td>
                                    <td> {{ $element->description }}</td>

                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(['action' => ['SubjectController@deleteSubject', $element->id],
                                                'method' => 'post']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit(trans('admin_subjects.delete-subject')) !!}
                                            {!! Form::close() !!}
                                        </div>
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