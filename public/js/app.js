/**
 * Created by dinhky on 08/08/2017.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $(".change-pass").click(function () {
        $(".new-pass").show();
    });
    clickQuestion();
    moveProgressBar();
// on browser resize...
    $(window).resize(function() {
        moveProgressBar();
    });

// SIGNATURE PROGRESS
    function moveProgressBar() {
        console.log("moveProgressBar");
        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
        var getProgressWrapWidth = $('.progress-wrap').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;


    }
    function clickQuestion() {
        $(".next-question").click(function () {
            console.log("+1");
            // $(".progress").setAttribute("data-progress-percent", "20");
            // $(window).resize(function() {
            //     moveProgressBar();
            // });
            var fname = "Nguyen Dinh";
            var lname = "Ky";
            $.post('test', {firstname:fname, lastname:lname}, function (data) {
               console.log(data);
            });
        });
    }
});
