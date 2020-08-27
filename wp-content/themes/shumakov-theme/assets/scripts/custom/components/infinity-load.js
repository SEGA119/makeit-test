(function($){
  
	$(document).ready(function() {
		
		var infinityLoad = '';
		var is_loading = false;
		var preview = '';
		
		function initLoadPreview() {
			var row = $('#infinityLoad');
			
			preview = row.find('.preview_item').clone();

            row.html('');
		}
		
		function showLoadPreview(num) {
			var row = $('#infinityLoad'); 
			
			if( preview != '' ) {
				for(var i = 0; i < num; i++) {
					row.append(preview.clone());
				}
			}

			row.show();
		}
		
		function appendPlaceholders(num) {
			var row = $('#postsRow'); 
			
			if( preview != '' ) {
				for(var i = 0; i < num; i++) {
					row.append(preview.clone().addClass('empty').html(''));
				}
			}

			row.show();			
		}
		
		function hideLoadPreview() {
			var row = $('#infinityLoad');
			
			row.html('');
			row.hide();
		}
		
		/* Load More posts */
		function getMorePosts() {
			
			var row = $('#postsRow');

			var posts = row.find('article').length;
			var page = row.data('page');
			var foundPosts = row.data('all');
			
			if( posts < foundPosts ) {
				
                is_loading = true;
              
                var items = foundPosts - posts;
				items = items < page ? items : page;
                showLoadPreview(items);
              
				ajaxCall('load_more_posts', {
					page: page,
					type: row.data('type'),
					foundPosts: foundPosts,
					posts: posts

				}, function(response) {
					
					hideLoadPreview();
					row.append(response.html);

					if( typeof response.posts != undefined ) {
						
						if( response.posts > 4 && response.posts < 8 ) {
							appendPlaceholders(8 - response.posts);						
						} else if( response.posts < 4 ) {
							appendPlaceholders(4 - response.posts);
						}
					}
					
					setTimeout(function() {
						is_loading = false;						
					}, 400);
					
					infiniteScrollCheck();
				}); 
				
				return true;
				
			} else {
				
				return false;
				
			}
						
		}
		
		/* ScrollMonitor integration here */
		function infiniteScrollInit() {

			infinityLoad = scrollMonitor.create( $("#infinityLoad")[0] );

			infinityLoad.unlock();
			
			$(window).scroll( function() {
								
				if( infinityLoad.isInViewport && !is_loading ) {
					if(!getMorePosts()) {
						$(window).unbind('scroll');
					}
				}				
				
			});
			
		}
		
		function infiniteScrollCheck() {
			
			if( infinityLoad != '' && infinityLoad.isInViewport && !is_loading ) {
				getMorePosts();
			}
			
		}
		
		/* Check infinite load on the page and init */
		function infiniteLoadInit() {
			if( $('#postsListing').length > 0 && $("#infinityLoad").length > 0 ) {
				initLoadPreview();
				infiniteScrollInit();
			}
		}
				
		infiniteLoadInit();
		
	});
  
})(jQuery);