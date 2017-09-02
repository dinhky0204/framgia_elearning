@extends('admin.layout')
@section('questions')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3 class="fa fa-book">List Question of <b>{{$course->name}}</b></h3>
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
                        @foreach($list_question as $key => $question)
                            <tr data-toggle="collapse" data-target="#collap{{$key}}">
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
                            <tr>
                                <td colspan="12">
                                    <div id="collap{{$key}} table-answer">
                                        <table class="collapse">
                                            <tbody>
                                            <tr>
                                                <th><i class="icon_tags"></i>Tag</th>
                                                <th><i class="icon_profile"></i>Answer content</th>
                                                <th><i class="icon_document"></i>Correct</th>
                                                <th><i class="icon_star"></i> Picture</th>
                                                <th><i class="icon_cogs"></i>{{ trans('admin_courses.delete') }}</th>
                                            </tr>
                                            <input type="hidden" value="{{$question->list_answer}}" name="total-answer">
                                            @foreach($question->list_answer as $answer)
                                                <div class="form-group">
                                                    <tr id="answer-box-{{$answer->id}}">
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                   id="answer-tag-{{$answer->id}}"
                                                                   value="{{$answer->tag}}" name="answer-tag-{{$answer->id}}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                   id="answer-content-{{$answer->id}}"
                                                                   value="{{$answer->answer_content}}"
                                                                   name="answer-content-{{$answer->id}}">
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <label><input type="radio" name="optradio">Option 1</label>
                                                            </div>
                                                            <select class="selectpicker show-tick" data-style="btn-primary"
                                                                    id="answer-correct-{{$answer->id}}"
                                                                    name="answer-correct-{{$answer->id}}">
                                                                @if($answer->correct == 0)
                                                                    <option value="0">Incorrect</option>
                                                                    <option value="1">Correct</option>
                                                                @else
                                                                    <option value="1">Correct</option>
                                                                    <option value="0">Incorrect</option>
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a id="delete-answer-img-{{$answer->id}}"
                                                               class="btn btn-danger delete-answer">Delete this answer</a>
                                                        </td>
                                                        <td>
                                                            <input id="{{$answer->id}}" type='file' value="{{$answer->id}}"
                                                                   onchange="readURL(this);" name="answer-desc-{{$answer->id}}"
                                                                   multiple>
                                                            <img id="answer-img-{{$answer->id}}"
                                                                 src="/img/answer_image/{{$answer->desc}}" alt="your image"
                                                                 style="height: 100px; width: 100px"/>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <br>
                                            @endforeach
                                            </tbody>
                                        </table>
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