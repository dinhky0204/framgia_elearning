/**
 * Created by dinhky on 08/08/2017.
 */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            console.log(input.value);
            $('#avatar-profile')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var count = 0;
    var point = 0;
    var correct_questions = [];
    $(".change-pass").click(function () {
        $(".new-pass").show();
    });
    clickQuestion();
    moveProgressBar();
    chooseAnswer();
    $(window).resize(function() {
        moveProgressBar();
    });

    function moveProgressBar() {
        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
        var getProgressWrapWidth = $('.progress-wrap').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;

        $('.progress-bar').stop().animate({
            left: progressTotal
        }, animationLength);
    }

    function clickQuestion() {
        $(".next-question").click(function () {
            count++;
            onClick();
            $(".result").hide();
            $(".incorrect-result").hide();
            if(count <= (window.list_question.length - 1)) {
                $("#img-1").attr('src',"/img/answer_image/" + window.list_question[count].answers[0].desc);
                $("#img-2").attr('src',"/img/answer_image/" + window.list_question[count].answers[1].desc);
                $("#img-3").attr('src',"/img/answer_image/" + window.list_question[count].answers[2].desc);
                $("#img-4").attr('src',"/img/answer_image/" + window.list_question[count].answers[3].desc);

                $("#answer-1").fadeOut(function () {
                    $("#answer-1").text(window.list_question[count].answers[0].tag + ".  " + window.list_question[count].answers[0].answer_content).fadeIn();
                });
                $("#answer-2").fadeOut(function () {
                    $("#answer-2").text(window.list_question[count].answers[1].tag + ".  " + window.list_question[count].answers[1].answer_content).fadeIn();
                });
                $("#answer-3").fadeOut(function () {
                    $("#answer-3").text(window.list_question[count].answers[2].tag + ".  " + window.list_question[count].answers[2].answer_content).fadeIn();
                });
                $("#answer-4").fadeOut(function () {
                    $("#answer-4").text(window.list_question[count].answers[3].tag + ".  " + window.list_question[count].answers[3].answer_content).fadeIn();
                });
                $(".question-content").fadeOut(function () {
                    $(".question-content").text(window.list_question[count].question_content).fadeIn();
                });
            }
            if(count == (window.list_question.length - 1)) {
                $(".next-question").fadeOut(function () {
                    $(".next-question").text("Kết thúc").fadeIn();
                });
            }
            if(count >= window.list_question.length ) {
                $.ajax({
                    url: window.course_id,
                    method: 'POST',
                    data: {
                        'correct_questions': correct_questions
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                        console.log("Error");
                    }
                });
                alert("Diem cua ban: " + point);
            }
        });
    }
    function offClick() {
        $('#img-1').off('click');
        $('#img-2').off('click');
        $('#img-3').off('click');
        $('#img-4').off('click');
    }

    function onClick() {
        $('#img-1').on('click', chooseAnswer);
        $('#img-2').on('click', chooseAnswer);
        $('#img-3').on('click', chooseAnswer);
        $('#img-4').on('click', chooseAnswer);
    }

    function chooseAnswer() {
        $("#img-1").click(function () {
            if(window.list_question[count].answers[0].correct == 1) {
                console.log("1 Click");
                $(".result").show();
                point++;
                correct_questions.push(window.list_question[count].id);
            }
            else {
                $(".incorrect-result").show();
            }
            offClick();
        });
        $("#img-2").click(function () {
            if(window.list_question[count].answers[1].correct == 1) {
                console.log("2 Click");
                $(".result").show();
                point++;
                correct_questions.push(window.list_question[count].id);
            }
            else {
                $(".incorrect-result").show();
            }
            offClick();
        });
        $("#img-3").click(function () {
            if(window.list_question[count].answers[2].correct == 1) {
                console.log("3 Click");
                $(".result").show();
                point++;
                correct_questions.push(window.list_question[count].id);
            }
            else {
                $(".incorrect-result").show();
            }
            offClick();
        });
        $("#img-4").click(function () {
            if(window.list_question[count].answers[3].correct == 1) {
                console.log("4 Click");
                $(".result").show();
                point++;
                correct_questions.push(window.list_question[count].id);
            }
            else {
                $(".incorrect-result").show();
            }
            offClick();
        });
    }
    $(".change-pass").click(function () {
        $(".new-pass").show();
    });
});
