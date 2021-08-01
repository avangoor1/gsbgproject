/*eslint-env jquery*/


$(document).ready(function() {
	/* For the sticky navigation */
	$('.js--section-features').waypoint(function(direction) {
		if (direction == "down") {
			$('nav').addClass('sticky');
		} else {
			$('nav').removeClass('sticky');
		}
	}, {
	  offset: '60px;'
	});
	
	/* Scroll on buttons */
	$('.js--scroll-to-plans').click(function () {
		$('html, body').animate({scrollTop: $('.js--section-plans').offset().top}, 1000);
	});
	$('.js--scroll-to-start').click(function () {
		$('html, body').animate({scrollTop: $('.js--section-features').offset().top}, 1000);
	});
	
	/* Animations on scroll */
	$('.js--wp-1').waypoint(function(direction) {
	$('.js--wp-1').addClass('animated fadeIn');
	}, {
		offset: '50%'
	});
	
	$('.js--wp-2').waypoint(function(direction) {
	$('.js--wp-2').addClass('animated fadeInUp');
	}, {
		offset: '50%'
	});
	
	$('.js--wp-3').waypoint(function(direction) {
	$('.js--wp-3').addClass('animated fadeIn');
	}, {
		offset: '50%'
	});
	
	$('.js--wp-4').waypoint(function(direction) {
	$('.js--wp-4').addClass('animated pulse');
	}, {
		offset: '50%'
	});

	$('.js--nav-icon').click(function() {
		var nav = $('.js--main-nav');
		var icon = $('.js--nav-icon i');
		
		nav.slideToggle(200);
		
		if (icon.hasClass('ion-navicon-round')) {
			icon.addClass('ion-close-round');
			icon.removeClass('ion-navicon-round');
		} else {
			icon.addClass('ion-navicon-round');
			icon.removeClass('ion-close-round');
		}
		
		
		
	});


/* Modal */

var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
	modal.style.display = "block";
}

span.onclick = function() {
	modal.style.display = "none";
}

window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}


/* TODO: Add a variable to store the "my-list" element */
var fullItemList = document.getElementById("my-list");


/* TODO: Create the event listener that listens for a mouse click and runs the checkOffList function */
if (fullItemList) {
  fullItemList.addEventListener("click", checkOffItem);
}

/* TODO: Declare the function checkOffList and add actions inside the { } */
function checkOffItem(clicked) {
  if (clicked.target.tagName == "LI") {            //find out which element triggered a specified event
    clicked.target.classList.toggle("all-done");   //apply the CSS rule set outlined in .all-done if condition is met
  }
}



});
