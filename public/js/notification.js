/**
 * Created by dinhky on 04/09/2017.
 */
$(document).ready(function () {
    var user_id = $("#user_info").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".dropdown-notifi").click(function () {
        console.log('ok');
        if($('.dropdown-menu-notifi').css('display') == 'none') {
            $('.dropdown-menu-notifi').show();
            $('.notification-total').text('0');
        }
        else $('.dropdown-menu-notifi').hide();

        $.ajax({
            url: "/home",
            method: 'POST',
            data: {
                'user_id' : user_id
            },
            success: function(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    console.log(data[i].following);
                    $(".dropdown-menu-notifi").append('<li><a href="#">'
                        + data[i].following + " " + data[i].content + " you" +
                        '</a></li>')
                }
            },
            error: function(data) {
                console.log("Error");
            }
        });
    });
});
