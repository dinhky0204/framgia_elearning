@extends('layouts.app')
@section('content')
    <div class="exam-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 exam-content" style=" height: 400px;">
                <div class="progress-wrap progress" data-progress-percent="10">
                    <div class="progress-bar progress"></div>
                </div>
                <div class="question-content">
                    <span>
                        <?= $list_question[0]->question_content ?>
                    </span>
                </div>
                <div class="glyphicon glyphicon-ok result col-md-offset-10"></div>
                <div class="glyphicon glyphicon-remove incorrect-result col-md-offset-10"></div>
                <div class="answer-content row">
                    <div class="col-md-2 box-answer">
                        <img id = "img-1" src="/img/answer_image/{{$list_question[0]->answers[0]->desc}}" style=" height: 120px; width: 120px;  ">
                        <div class="answer-tag" id="answer-1"><?= $list_question[0]->answers[0]->tag . ".  " . $list_question[0]->answers[0]->answer_content?></div>
                    </div>
                    <div class="col-md-2 box-answer">
                        <img id = "img-2" src = "/img/answer_image/{{$list_question[0]->answers[1]->desc}}" style="height: 120px; width: 120px;">
                        <div class="answer-tag" id="answer-2"><?= $list_question[0]->answers[1]->tag . ".  " . $list_question[0]->answers[1]->answer_content?></div>
                    </div>
                    <div class="col-md-2 box-answer">
                        <img id = "img-3" src = "/img/answer_image/{{$list_question[0]->answers[2]->desc}}" style="height: 120px; width: 120px;">
                        <div class="answer-tag" id="answer-3"><?= $list_question[0]->answers[2]->tag . ".  " . $list_question[0]->answers[2]->answer_content?></div>
                    </div>
                    <div class="col-md-2 box-answer">
                        <img id = "img-4" src = "/img/answer_image/{{$list_question[0]->answers[3]->desc}}" style="height: 120px; width: 120px;">
                        <div class="answer-tag" id="answer-4"><?= $list_question[0]->answers[3]->tag . ".  " . $list_question[0]->answers[3]->answer_content?></div>
                    </div>
                </div>
                <a type="button" class="col-md-2 col-md-offset-10 btn-primary btn-lg next-question" value = 100>Next</a>
            </div>
        </div>
    </div>
@endsection
