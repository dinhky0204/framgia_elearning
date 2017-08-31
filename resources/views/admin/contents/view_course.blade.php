@extends('admin.layout')
@section('questions')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3 class="fa fa-book">Question list</h3>
                    </header>
                    <br>
                    <br>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th><i class="glyphicon glyphicon-edit"></i>{{ trans('admin_questions.question_content') }}</th>
                            <th><i class="icon_star"></i>{{ trans('admin_questions.description') }}</th>
                            <th><i class="icon_adjust-horiz"></i> {{ trans('admin_questions.total_answer') }} </th>
                            <th><i class="icon_tags"></i>{{ trans('admin_questions.type') }}</th>
                            <th><i class="icon_trash_alt"></i>{{ trans('admin_questions.delete') }}</th>
                            <th><i class="icon_pencil"></i>{{ trans('admin_questions.edit') }}</th>
                        </tr>
                        @foreach($list_question as $question)
                            <tr>
                                <td> {{ $question->question_content }} </td>
                                <td> {{ $question->description }} </td>
                                <td> {{ $question->total_answer }}</td>
                                <td> {{ $question->type->type }}</td>
                                <td>
                                    {!! Form::open(['action' => ['Admin\QuestionController@deleteQuestion', $question->id],
                                        'method' => 'post']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::hidden('course-id', $question->course->id) !!}
                                    {!! Form::submit(trans('admin_questions.delete'), ['class' => "btn btn-danger"]) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <a href="{{route('admin_edit_question', $question->id)}}" class="btn btn-primary">
                                        {{trans('admin_questions.edit')}}
                                    </a>
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