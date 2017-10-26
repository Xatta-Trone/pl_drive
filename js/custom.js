$(document).ready(function(){
	//scroll to top
	 $(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
	        $('#return-to-top').fadeIn(200);   // Fade in the arrow
	        $("#sticker").addClass("lightheader");
	    } else {
	        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
	        $("#sticker").removeClass("lightheader");
	    }
	});
	$('#return-to-top').click(function() {      // When arrow is clicked
	    $('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 500);
	});

	/*$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 50) {
        //clearHeader, not clearheader - caps H
        $("#sticker").addClass("lightheader");
    }
	}); */


	   
  });
