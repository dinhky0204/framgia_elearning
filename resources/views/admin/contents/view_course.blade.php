@extends('admin.layout')
@section('questions')
    {{ HTML::script('/js/admin_course.js') }}
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
                        <a href="{{route('create_question')}}" class="btn btn-primary">Create Question</a>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>
                                    <i class="glyphicon glyphicon-edit"></i>{{ trans('admin_questions.question_content') }}
                                </th>
                                <th><i class="icon_star"></i>{{ trans('admin_questions.description') }}</th>
                                <th><i class="icon_adjust-horiz"></i> {{ trans('admin_questions.total_answer') }} </th>
                                <th><i class="icon_tags"></i>{{ trans('admin_questions.type') }}</th>
                            </tr>
                            <input id="list_question" type="hidden" value="{{$list_question}}">
                            @foreach($list_question as $key => $question)

                                <tr data-toggle="collapse" id="collap{{$question->id}}" class="success ">
                                    <td> {{ $question->question_content }} </td>
                                    <td> {{ $question->description }} </td>
                                    <td> {{ $question->total_answer }}</td>
                                    <td> {{ $question->type->type }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12">
                                        {!! Form::open(['action' => ['Admin\QuestionController@checkeditQuestion', $question->id], 'method' => 'post', 'files' => true]) !!}
                                        <div class="table-answer">
                                            <table class="collapse list-answer" id="collap-content{{$question->id}}">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_tags"></i>Tag</th>
                                                    <th><i class="icon_profile"></i>Answer content</th>
                                                    <th><i class="icon_document"></i>Correct</th>
                                                    <th><i class="icon_star"></i> Picture</th>
                                                    <th><i class="icon_cogs"></i>Delete</th>
                                                </tr>
                                                <div class="col-md-9 col-md-offset-2">
                                                    <label>Question content</label>
                                                    <textarea class="form-control" rows="3" id="comment"
                                                        name="question-content">{{$question->question_content}}</textarea>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2">
                                                    <label for="">Point of question</label>
                                                    <select class="selectpicker" id="question-point" name="question-point">
                                                        <optgroup label="Point of question">
                                                            @if($question->point == 1)
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            @elseif($question->point == 2)
                                                                <option value="2">2</option>
                                                                <option value="1">1</option>
                                                                <option value="3">3</option>
                                                            @else
                                                                <option value="3">3</option>
                                                                <option value="2">2</option>
                                                                <option value="1">1</option>
                                                            @endif
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Type of question</label>
                                                    <select class="selectpicker" id="question-type" name="question-type">
                                                        <optgroup label="Type of question">
                                                            @foreach($list_type as $type)
                                                                @if($type->id == $question->question_type_id)
                                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                                @endif
                                                            @endforeach
                                                            @foreach($list_type as $type)
                                                                @if($type->id != $question->question_type_id)
                                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Course</label>
                                                    <select class="selectpicker" id="course-of-question"
                                                            name="new-course-of-question">
                                                        <optgroup label="Course of question">
                                                            @foreach($list_course as $course)
                                                                @if($question->course_id == $course->id)
                                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                                @endif
                                                            @endforeach
                                                            @foreach($list_course as $course)
                                                                @if($question->course_id != $course->id)
                                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <input type="hidden" value="{{$question->list_answer}}"
                                                       name="total-answer">
                                                @foreach($question->list_answer as $answer)
                                                    <div class="form-group">
                                                        <tr id="answer-box-{{$answer->id}}">
                                                            <td>
                                                                <input type="text" class="form-control"
                                                                       id="answer-tag-{{$answer->id}}"
                                                                       value="{{$answer->tag}}"
                                                                       name="answer-tag-{{$answer->id}}">
                                                            </td>
                                                            <td class="col-md-3">
                                                                <input type="text" class="form-control"
                                                                       id="answer-content-{{$answer->id}}"
                                                                       value="{{$answer->answer_content}}"
                                                                       name="answer-content-{{$answer->id}}">
                                                            </td>
                                                            <td class="col-md-2">
                                                                @if($answer->correct == 0)
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="optradio"
                                                                                      value="{{$answer->id}}" class = "correct"></label>
                                                                    </div>
                                                                @else
                                                                    <div class="radio active">
                                                                        <label><input class = "correct" type="radio" name="optradio"
                                                                                      checked="" value="{{$answer->id}}"></label>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <input id="{{$answer->id}}" type='file'
                                                                       value="{{$answer->id}}"
                                                                       onchange="readURL(this);"
                                                                       name="answer-desc-{{$answer->id}}"
                                                                       multiple>
                                                                <img id="answer-img-{{$answer->id}}"
                                                                     src="/img/answer_image/{{$answer->desc}}"
                                                                     alt="your image"
                                                                     style="height: 100px; width: 100px"/>
                                                            </td>
                                                            <td>
                                                                <a id="delete-answer-img-{{$answer->id}}"
                                                                   class="btn btn-danger delete-answer">Delete</a>
                                                            </td>
                                                        </tr>
                                                    </div>
                                                    <br>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div style="margin-top: 10%">
                                                <div class="col-md-2 col-md-offset-3">
                                                    {!! Form::submit('Update question', ['class' => "btn btn-primary"]) !!}
                                                </div>
                                                {!! Form::close() !!}
                                                <div class="col-md-2">
                                                    @include('admin.contents.create_answer')
                                                </div>
                                                <div class="col-md-2">
                                                    {!! Form::open(['action' =>     ['Admin\QuestionController@deleteQuestion', $question->id],
                                                    'method' => 'post']) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::hidden('course-id', $question->course->id) !!}
                                                    {!! Form::submit('Delete Question', ['class' => "btn btn-danger"]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>


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
    <style>
        .list-answer {
            margin-left: 180px;
            margin-top: 50px;
        }
    </style>
@endsection