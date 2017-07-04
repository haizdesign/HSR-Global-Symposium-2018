jQuery(document).ready(function($) {

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
    // Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	  });

	  // scroll to top
	  $("#scrollup").hide();

	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 1000) {
				$('#scrollup').fadeIn();
			} else {
				$('#scrollup').fadeOut();
			}
		});
		$('#scrollup').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

    //  styling on select items
    $(function () {
        $('select').selectric();
    });

});
