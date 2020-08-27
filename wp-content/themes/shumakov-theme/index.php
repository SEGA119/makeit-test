<?php 

	get_header(); 

	$query = ss_theme_posts_infinity_load_query();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section id="listingSection" class="posts_archive page_section">
				<div class="section_inner">
						
                    <div class="section_head">
						<div class="container">
							<h1 class="section_title"><?php echo __('MakeIT Test', 'ss-theme'); ?></h1>
						</div>
                    </div>

					<?php if ( $query->have_posts() ) : ?>

					<div class="container">
					
                      <div id="postsListing" class="posts_listing">
                          <div id="postsRow" class="row" data-type="post" data-all="<?= $query->found_posts ?>" data-page="10">
                              <?php 
                                  while( $query->have_posts() ): $query->the_post();

                                      get_template_part('template-parts/content/content', 'post');

                                  endwhile;
                              ?>
                          </div>

                          <!-- Load more posts after scrolling to this block -->
                          <div id="infinityLoad" class="row" style="display: none;">								
                              <!-- Template for preloading item preview -->
                              <div class="preview_item">
                                  <div class="preview_item__inner">
                                      <div class="preview_item__image"></div>
                                      <div class="preview_item__desc">
                                          <div class="preview_item__name">
                                              <span></span>
                                              <span></span>
                                              <span></span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>

                      <?php else: 
						
                          get_template_part('template-parts/content/content', 'none');
						
                      endif; ?>
					
					</div>
				</div>
				
			</section>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
