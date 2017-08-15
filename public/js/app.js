/**
 * Created by dinhky on 08/08/2017.
 */
function box_text() {
    var path = document.getElementById("path");
    var length = path.getTotalLength();
    var percentage = 0;
    path.style.strokeDasharray = length + ' ' + length;

    path.style.strokeDashoffset = length;

    path.getBoundingClientRect();

    var interval = setInterval(function() {
        percentage += 0.01;
        var drawLength = length * percentage;
        path.style.strokeDashoffset = length - drawLength;

        if (percentage >= 0.99) {
            path.style.strokeDasharray = "none";
            clearInterval(interval);
        } else {
            path.style.strokeDasharray = length + ' ' + length;
        }

    }, 20);
}
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
    followCourse();
    unfollowCourse();
    course_progress();
    box_text();
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
        $(".next-question").on('click', function () {
            count++;
            onClick();
            var progress = 0;
            $(".result").hide();
            $(".incorrect-result").hide();
            progress = 100 - (count+1)/window.list_question.length*100;
            $("#progress-test").css('width', progress + "%");
            // $("#progress-test").attr('data-progress-percent', progress);
            if(count <= (window.list_question.length - 1)) {
                $(".question-content").html(window.list_question[count].question_content);
                var i = 1;
                for (i = 1; i <= window.list_question[count].answers.length; i++) {
                    $("#img-" + i).attr('src',"/img/answer_image/" + window.list_question[count].answers[i-1].desc);
                    $("#answer-" + i).fadeOut();
                    $("#answer-" + i).text(window.list_question[count].answers[i-1].tag + ".  " + window.list_question[count].answers[i-1].answer_content).fadeIn();
                }

            }
            if(count == (window.list_question.length - 1)) {
                $(".next-question").fadeOut(function () {
                    $(".next-question").text("Kết thúc").fadeIn();
                });
            }
            if(count >= window.list_question.length ) {
                progress = 100 - count/window.list_question.length*100;
                $("#progress-test").css('width', progress + "%");
                $.ajax({
                    url: "",
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
                alert("Điểm của bạn: " + point + '/' + count);
                window.location.href = '/home';
            }
        });
    }
    function course_progress(){
        var $ppc = $('.progress-pie-chart'),
            percent = parseInt($ppc.data('percent')),
            deg = 360*percent/100;
        if (percent > 50) {
            $ppc.addClass('gt-50');
        }
        $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
        $('.ppc-percents span').html(percent+'%');
    }
    function followCourse() {
        $('.follow-course-btn').click(function () {
            var course_id = $(this).attr('value');
            console.log(course_id);
            $.ajax({
                url: "/list_course/{course_id}/follow",
                method: 'POST',
                data: {
                    'course_id': course_id
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(data) {
                    console.log("Error");
                    window.location.reload();
                }
            });
        });
    }
    function unfollowCourse() {
        $('.unfollow-course-btn').click(function () {
            console.log('ok');
            var course_id = $(this).attr('value');
            console.log(course_id);
            $.ajax({
                url: "/list_course/unfollow",
                method: 'POST',
                data: {
                    'course_id': course_id
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(data) {
                    console.log("Error");
                    window.location.reload();
                }
            });
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
