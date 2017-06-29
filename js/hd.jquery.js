jQuery(document).ready(function($) {
    // alert('Working!')

    // $('<div class="menu-bg"></div>').insertBefore('.primary-menu .sub-menu');
    // $('.menu-bg').hide();
    //
    // $('.main-navigation ul li.menu-item-has-children').hover(function() {
    //     $('.menu-bg').show()
    // }, function() {
    //     $('.menu-bg').delay(300).slideUp()
    // });

    // in page scrolling menu
    var length = $('#content').height() - $('.page-menu').height() + $('#content').offset().top;

    $(window).scroll(function () {

        var scroll = $(this).scrollTop();
        var height = $('.page-menu').height() + 'px';

        if (scroll < $('#content').offset().top) {

            $('.page-menu').css({
                'position': 'absolute',
                'top': '0'
            });

        } else if (scroll > length) {

            $('.page-menu').css({
                'position': 'absolute',
                'bottom': '0',
                'top': 'auto'
            });

        } else {

            $('.page-menu').css({
                'position': 'fixed',
                'top': '0',
                'height': height
            });
        }
    });

});
