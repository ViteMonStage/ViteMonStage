$(document).ready(function () {

    $("#submit").click(function (e) {
        if (!checkFields()) {
            return false;
        }
    });

});

function checkFields() {
    if (!$('#mailtbx').val()) {
        sendNotSet("mailtbx","mail-not-set");
        if (!$('#passtbx').val()) {
            sendNotSet("passtbx","password-not-set");
            return false;
        }
        return false;
    } if (!$('#passtbx').val()) {
        sendNotSet("passtbx","password-not-set");
        return false;
    }
    return true;
}

function sendNotSet(e,e2) {
    var element = document.getElementById(e);
    var element2 = document.getElementsByClassName(e2);
    var interval = 50;
    var distance = 5;
    var times = 4;

    $(element2).css('display','inherit')
    $(element).css('position', 'relative');
    $(element).css('backgroundColor', '#ffd6d6');
    for (var iter = 0; iter < (times + 1); iter++) {
        $(element).animate({
            left: ((iter % 2 == 0 ? distance : distance * -1))
        }, interval);
    }
    $(element).animate({ left: 0 }, interval);
}