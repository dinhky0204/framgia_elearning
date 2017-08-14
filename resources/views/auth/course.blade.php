@extends('layouts.app')
@section('content')
    <div class="exam-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 exam-content">
                <div class="progress-wrap progress" data-progress-percent="" id = "">
                    <div class="progress-bar progress" id="progress-test"></div>
                </div>
                <div class="question-content">
                    <?= $list_question[0]->question_content ?>
                </div>
                <div class="glyphicon glyphicon-ok result col-md-offset-10"></div>
                <div class="glyphicon glyphicon-remove incorrect-result col-md-offset-10"></div>
                <div class="answer-content row">
                        @foreach($list_question[0]->answers as $key => $answer)
                            <div class="col-md-2 box-answer">
                                <img id = "img-{{$key+1}}" src="/img/answer_image/{{$answer->desc}}">
                                <div class="answer-tag" id="answer-{{$key+1}}"><?= $answer->tag . ".  " . $answer->answer_content ?></div>
                            </div>
                            @if($key > 2)
                                </div>
                                <div class="answer-content row">
                            @endif
                        @endforeach
                </div>
                <a type="button" class="col-md-2 col-md-offset-10 btn-primary btn-lg next-question" value = 100>Next</a>
            </div>
        </div>
    </div>
@endsection
