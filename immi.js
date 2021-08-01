	/*eslint-env jquery*/

	/* Scroll on buttons */
$(document).ready(function() {
    $('.js--scroll-to-facts').click(function () {
        	$('html, body').animate({scrollTop: $('.js--section-facts').offset().top}, 1000);
	});

});