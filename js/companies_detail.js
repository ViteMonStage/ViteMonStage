$(document).ready(function () {

    $(".uncheckable").click(function (e) {
        return false;
    });

    $("#btn-submit").click(function (e) {
        var wer = $("input[type=radio][name=working-environnement-rating]:checked").val();
        var wcr = $("input[type=radio][name=working-conditions-rating]:checked").val();
        var wr = $("input[type=radio][name=wage-rating]:checked").val();
        var aer = $("input[type=radio][name=acquired-experience-rating]:checked").val();
        var sqr = $("input[type=radio][name=supervision-quality-rating]:checked").val();
        var desctbx = $("textarea[name=desctbx]").val();
        if(wer == null || wcr == null || wr == null || aer == null || sqr == null || desctbx == null){
            alert("Please fill all fields")
            return false;}
        else{
            return true;
        }
    });

});