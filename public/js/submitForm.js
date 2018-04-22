$(document).ready(function () {
    formBtnController();
    submitBtn();
});

/**
 *  edit
 *  left css of submit btn
*/
function submitBtn(){
    editLeft();
    $(window).resize(function () {
        editLeft();
    });
    function editLeft(){
        var width = $(window).width();
        var height = $(window).height();
        if(width> 1200){
            var btnWidth = $("#formSubmit").width();
            var left = (width - 1200)/2 + 1150 - btnWidth;
            $("#formSubmit").css("left",left);
        }else{
            $("#formSubmit").css("left",1000);
        }
    }
}

/**
 *  edit
 *  left css of submit btn
 */
function formBtnController(){
    $("#formControlButton").on('click',function(){
        var btnValue = $("#formControlButton").text();
        if(btnValue == '-'){
            $("#formControlButton").html("+");
            $("#personalFormInput").fadeOut();
        }else{
            $("#formControlButton").html("-");
            $("#personalFormInput").fadeIn();
        }
    });

    $("#commentControlButton").on('click',function(){
        var btnValue = $("#commentControlButton").text();
        if(btnValue == '-'){
            $("#commentControlButton").html("+");
            $("#commentTextArea").fadeOut();
        }else{
            $("#commentControlButton").html("-");
            $("#commentTextArea").fadeIn();
        }
    });

}