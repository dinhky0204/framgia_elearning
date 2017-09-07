$(document).ready(function () {
    var list_question = JSON.parse($('#list_question').val());
    $.each(list_question, function (key, element) {
        $("#collap" + element.id).click(function () {
            if($("#collap-content" + element.id).css('display') == 'none') {
                $("#collap-content" + element.id).show();
                console.log("collap-content" + element.id);
            }
            else $("#collap-content" + element.id).hide();
        });
    });
});
