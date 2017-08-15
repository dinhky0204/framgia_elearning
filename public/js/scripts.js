function initializeJS() {

    //tool tips
    $('.tooltips').tooltip();

    //popovers
    $('.popovers').popover();

    //sidebar dropdown menu
    $('#sidebar .sub-menu > a').click(function () {
        var last = $('.sub-menu.open', $('#sidebar'));
        $('.menu-arrow').removeClass('arrow_carrot-right');
        $('.sub', last).slideUp(200);
        var sub = $(this).next();
        if (sub.is(":visible")) {
            $('.menu-arrow').addClass('arrow_carrot-right');
            sub.slideUp(200);
        } else {
            $('.menu-arrow').addClass('arrow_carrot-down');
            sub.slideDown(200);
        }
        var o = ($(this).offset());
        diff = 200 - o.top;
        if (diff > 0)
            $("#sidebar").scrollTo("-=" + Math.abs(diff), 500);
        else
            $("#sidebar").scrollTo("+=" + Math.abs(diff), 500);
    });

    // sidebar menu toggle
    $(function () {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }

        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.toggle-nav').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-180px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '180px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

    //bar chart
    if ($(".custom-custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }

}
function updateSubject() {
    $("#update-subject").on('click', function () {
        if($("#subject-name").val() == "" || $("#subject-name").val() == "") {
            alert("Can't Blank");
        }
        else {
            $.ajax({
                url: "",
                method: 'PUT',
                data: {
                    'id' : $("#subject-id").val(),
                    'name' : $("#subject-name").val(),
                    'description' : $("textarea#subject-description").val()
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(data) {
                    console.log("Error");
                }
            });
        }
    });
}

function createSubject() {
    $("#create-subject").on('click', function () {
        if($("#create-subject-name").val() == "" || $("#create-subject-name").val() == "") {
            alert("Can't Blank");
        }
        else {
            $.ajax({
                url: "",
                method: 'POST',
                data: {
                    'name' : $("#create-subject-name").val(),
                    'description' : $("textarea#create-subject-description").val()
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(data) {
                    console.log("Error");
                }
            });
        }
    });
}

function editCourse() {
    var object;
    $(".edit-course").click(function () {
        var data = $(this).val();
        object = JSON.parse(data);
        $("#edit-course-name").val(object.name);
        $("#edit-course-description").val(object.desc);
        $("#edit-course-id").attr("value", object.id);
    });
    $("#update-course").on('click', function () {
        if($("#edit-course-name").val() == "" || $("#edit-course-description").val() == "") {
            alert("Can't Blank");
        }
        else {
            $.ajax({
                url: "",
                method: 'PUT',
                data: {
                    'old_subject_id' : object.subject.id,
                    'new_subject_id' : $('.selectpicker').val(),
                    'id' : $("#edit-course-id").val(),
                    'name' : $("#edit-course-name").val(),
                    'description' : $("textarea#edit-course-description").val()
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(data) {
                    console.log("Error");
                }
            });
        }
    });
}

function createCourse() {
    $("#create-course").on('click', function () {
        if($("#create-course-name").val() == "" || $("#create-course-description").val() == "") {
            alert("Can't Blank");
        }
        else {
            $.ajax({
                url: "",
                method: 'POST',
                data: {
                    'subject_id': $(".selectpicker").val(),
                    'name' : $("#create-course-name").val(),
                    'description' : $("textarea#create-course-description").val()
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(data) {
                    console.log("Error");
                }
            });
        }
    });
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var id_img = input.id;
        reader.onload = function (e) {
            console.log(input.value);
            $('#answer-img-' + id_img)
                .attr('src', e.target.result)
                .width(100)
                .height(100);
            $('#new-answer-img')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function deleteAnswer() {
    $(".delete-answer").click(function () {
        var parent_id = this.id.split("-");
        $("#answer-box-" + parent_id[3]).remove();
        $("#" + parent_id[3]).attr("value", "delete");
        $("#answer-content-" + parent_id[3]).attr('value', "");
    });
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    initializeJS();
    updateSubject();
    createSubject();
    editCourse();
    createCourse();
    deleteAnswer();
    $(".id-1").on("click", function () {
        var data = $(this).val();
        var object = JSON.parse(data);
        $("#subject-name").val(object.name);
        $("#subject-description").val(object.description);
        $("#subject-id").attr("value", object.id);
    });
});