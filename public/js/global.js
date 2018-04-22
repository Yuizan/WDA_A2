$.getScript("./JS/util.js");

$(document).ready(function () {
    aboutUsAnimation();
    headerAnimation();
});

/**
 * hide about us
 * show about us
 */
function aboutUsAnimation() {
    $("#aboutUsClosed").on('click', function () {
        $('#aboutUsContents').fadeOut('slow');
        $('.aboutUsClosed').fadeOut('slow');
        $('#aboutUsOpened').show('slow');
    });

    $("#aboutUsOpened").on('click', function () {
        $('#aboutUsContents').fadeIn('slow');
        $('.aboutUsClosed').fadeIn('slow');
        $('#aboutUsOpened').hide('slow');
    });

}


/**
 *  change header layout
 *  scroll action
 *  resize windows action
 */
function headerAnimation() {
    var width = $(window).width();
    var top = $(window).scrollTop();
    if (width > 1150 && top > 540) {
        $('#nav').css({"position": "fixed", "top": "0"});
        $('#navLogo').css("display", "block");
        $('#navDetails').css("display", "block");
    } else if (width < 1150 && top > 540) {
        $('#nav').css('display', 'none');
    } else {
        $('#nav').css({"display": "block", "position": "relative", "top": "none"});
        $('#navLogo').css("display", "none");
        $('#navDetails').css("display", "none");
    }

    //codes running when page load or reload
    $(document).on('scroll', function () {
        var width = $(window).width();
        var top = $(window).scrollTop();
        if (width > 1150 && top > 540) {
            $('#nav').css({"position": "fixed", "top": "0"});
            $('#navLogo').css("display", "block");
            $('#navDetails').css("display", "block");
        } else if (width < 1150 && top > 540) {
            $('#nav').css('display', 'none');
        } else {
            $('#nav').css({"display": "block", "position": "relative", "top": "none"});
            $('#navLogo').css("display", "none");
            $('#navDetails').css("display", "none");
        }
    });


    //change nav when windows resize
    $(window).resize(function () {
        var top = $(window).scrollTop();
        var scrollTop = $(this).scrollTop();
        var width = $(this).width();
        var height = $(this).height();

        if (width < 1150 && top > 540) {
            $('#nav').css('display', 'none');
        } else if (width > 1150 && top < 540) {
            $('#nav').css('display', 'block');
        } else if (width > 1150 && top > 540) {
            $('#nav').css('display', 'block');
        }
    });
}
