(function($){
	
	$(document).ready(function() {
		
		$('#scrollTop').on('click touch', function() {
			
			$('html, body').stop().animate({
				scrollTop: 0
			}, 800);
			
		});
		
	});
	
})(jQuery);