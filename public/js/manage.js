$.getScript("./JS/util.js");

$(document).ready(function () {
    $(".formMoreBtn").on('click', function (event) {
        var dataTitle = "more";
        var id = getDataId(event, dataTitle);

        var btnID = "#formMore" + id;
        var detailID = "#formDetail" + id;
        var submitID = "#formEditSubmit" + id;
        var userInfoID = "#formUserInfo" + id;

        var btnText = $(btnID).text();

        if (btnText === "MORE") {
            $(btnID).html("CLOSE");
            $(detailID).fadeIn();
            $(userInfoID).fadeIn();
            $(submitID).fadeIn();
        } else {
            $(btnID).html("MORE");
            $(detailID).fadeOut();
            $(userInfoID).fadeOut();
            $(submitID).fadeOut();
        }
    });
});