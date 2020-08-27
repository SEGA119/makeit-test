(function($){
	
	$(document).ready(function() {
		
		$('.navigation_toggle').on('click tounch', function(e) {
			
			$(this).toggleClass('active');	
			$('#site-navigation .navigation_menu').toggleClass('opened');
			
		});
		
	});
	
})(jQuery);