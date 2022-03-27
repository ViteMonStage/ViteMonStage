$(document).ready(function () {

    $("#submit").click(function (e) {
        if (!checkFields()) {
            return false;
        }
    });

});

function checkFields() {
    if (!$('#mailtbx').val()) {
        sendNotSet("mailtbx");
        if (!$('#passtbx').val()) {
            sendNotSet("passtbx");
            return false;
        }
        return false;
    } if (!$('#passtbx').val()) {
        sendNotSet("passtbx");
        return false;
    }
    return true;
}

function sendNotSet(e) {
    var element = document.getElementById(e);
    var interval = 100;
    var distance = 10;
    var times = 4;

    $(element).css('position', 'relative');
    $(element).css('backgroundColor', '#ffd6d6');
    for (var iter = 0; iter < (times + 1); iter++) {
        $(element).animate({
            left: ((iter % 2 == 0 ? distance : distance * -1))
        }, interval);
    }
    $(element).animate({ left: 0 }, interval);
}