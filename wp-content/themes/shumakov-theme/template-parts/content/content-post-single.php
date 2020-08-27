<section id="listingSection" class="posts_archive page_section">
	<div class="section_inner">

		<div class="section_head">
			<div class="container">
				<h1 class="section_title"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
		
		<div class="container">
			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading %s', 'ss-theme' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ss-theme' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ss-theme' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- .entry-content -->

			<?php
				// Author bio.
				if ( is_single() && get_the_author_meta( 'description' ) ) :
					get_template_part( 'author-bio' );
				endif;
			?>

			<footer class="entry-footer">
				<?php ss_theme_entry_meta(); ?>
				<?php edit_post_link( __( 'Edit', 'ss-theme' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
			
			<?php 
			
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'ss-theme' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'ss-theme' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'ss-theme' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'ss-theme' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>			
		
		</div>
		
	</div>
</section>