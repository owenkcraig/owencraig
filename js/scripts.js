$(function() {
	

	// Dropdown Nav on mobile
	$('.fa-bars').click(function(){
		$(this).next().slideToggle();
	});

	$('.showMobileNav .menu-item a').click(function(){
		$('.showMobileNav').slideToggle();
	});

	// Sticky nav
	$("#nav").stick_in_parent();

	// Parallax effect
	$(window).stellar({
		responsive: true
	});



	// Smooth Scroll
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top-40
	        }, 1000);
	        return false;
	      }
	    }
	  });

});
