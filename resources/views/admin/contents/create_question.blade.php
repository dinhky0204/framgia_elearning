@extends('admin.layout')
@section('questions')
<div id="main-content">
    <section class="wrapper">
        {!! Form::open(['action' => ['Admin\QuestionController@checkCreateQuestion'], 'method' => 'post', 'files' => true, "name" => 'myForm', "id" => 'myForm']) !!}
        {{ csrf_field() }}
        <input type="hidden" name="question_object" id="question-object">
            <div class="form-group col-md-6 col-md-offset-3">
                <label for="name" class="control-label">Question content:</label>
                <input type="text" class="form-control" name="question-content" required>
            </div>
            <div class="col-md-offset-3 col-md-3">
                <label for="">Point of question:</label> <br>
                <select class="selectpicker show-tick" data-style="btn-primary"
                        name="question-point">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Course:</label> <br>
                <select class="selectpicker show-tick" data-style="btn-primary"
                        name="question-course">
                    @foreach($list_course as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 col-md-offset-3" style="margin-bottom: 5%">
                <label for="">Type of question:</label> <br>
                <select class="selectpicker show-tick" data-style="btn-primary"
                        name="question-type">
                    @foreach($list_type as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>
        <div class="col-md-4" id="choose-total-answer">
            <label for="">Total answer of question:</label> <br>
            <select class="selectpicker show-tick choose-total-answer" data-style="btn-primary"
                    name="total-answer">
                <option value="1" class="total-answer" id="choose-total-question">1</option>
                <option value="2" class="total-answer" id="choose-total-question">2</option>
                <option value="3" class="total-answer" id="choose-total-question">3</option>
                <option value="4" class="total-answer" id="choose-total-question">4</option>
                <option value="5" class="total-answer" id="choose-total-question">5</option>
            </select>
        </div>

    </section>
    <div class="box-answer col-md-9 col-md-offset-2">
        <div id="answer" class="list-answer">
            <div class="col-md-3">
                <input type="text" class="form-control"
                       id= "" name="answer_tag" required placeholder="Answer-tag">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control"
                       id=""
                       name="answer_content" required placeholder="Answer-content">
            </div>
            <div class="col-md-1">
                <div class="radio">
                    <label><input type="radio" name="answer_correct" class="answer-correct" value="0"></label>
                </div>
            </div>

            <div class="col-md-2">
                <input id="new-answer-desc" type='file'
                       onchange="readURL(this);" name="answer_desc"
                       multiple>
                <img id="new-answer-img"
                     src="/img/answer_image/default.jpg" alt="your image"
                     style="height: 100px; width: 100px"/>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-success col-md-2 col-md-offset-4" id="question-create">Create</button>
    {!! Form::close() !!}

</div>
<script>

</script>
@endsection