<?php
/**
 * Template Name: Contact
 */
	get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section id="listingSection" class="posts_archive page_section">
			<div class="section_inner">

				<div class="section_head">
					<div class="container">
						<h1 class="section_title"><?php single_post_title(); ?></h1>
					</div>
				</div>

				<div class="container">
					
					<div class="contacts" itemscope itemtype="https://schema.org/Organization">
						<div class="row">
							<!-- Address -->
							<div class="contacts_block">
								<div class="contacts_block__image">
									<img src="<?php echo IMG_DIR . 'address_regular.png' ?>" 
										 srcset="<?php echo IMG_DIR . 'address_regular.png' ?> 1x, <?php echo IMG_DIR . 'address_retina.png' ?> 2x"
										 alt="<?php echo __('Address', 'ss-theme') ?>" 
										 title="<?php echo __('Address', 'ss-theme') ?>" 
										 />
								</div>
								<div class="contacts_block__desc" 
									 itemprop="address" 
									 itemscope 
									 itemtype="https://schema.org/PostalAddress"
									 >
									<span itemprop="postalCode">1211</span> <span itemprop="streetAddress">Awesome Avenue</span>, <br /><span itemprop="addressLocality">NY</span> <span itemprop="addressCountry">USD</span>
								</div>
							</div>
							<!-- Phone -->
							<div class="contacts_block">
								<div class="contacts_block__image">
									<img src="<?php echo IMG_DIR . 'mobile_regular.png' ?>" 
										 srcset="<?php echo IMG_DIR . 'mobile_regular.png' ?> 1x, <?php echo IMG_DIR . 'mobile_retina.png' ?> 2x"
										 alt="<?php echo __('Phone', 'ss-theme') ?>" 
										 title="<?php echo __('Phone', 'ss-theme') ?>" 
										 />
								</div>
								<div class="contacts_block__desc">
									<a href="tel:+0012345678"
									   itemprop="telephone"
									   >+00 123-456-78</a>
									<a href="tel:+0012345678"
									   itemprop="telephone"
									   >+00 123-456-78</a>
								</div>
							</div>
							
							<!-- Email -->
							<div class="contacts_block">
								<div class="contacts_block__image">
									<img src="<?php echo IMG_DIR . 'web_regular.png' ?>" 
										 srcset="<?php echo IMG_DIR . 'web_regular.png' ?> 1x, <?php echo IMG_DIR . 'web_retina.png' ?> 2x"
										 alt="<?php echo __('Email', 'ss-theme') ?>" 
										 title="<?php echo __('Email', 'ss-theme') ?>" 
										 />
								</div>
								<div class="contacts_block__desc">
									<a href="mailto:mint@mintmail.com"
									   itemprop="email"
									   >mint@mintmail.com</a>
								</div>
							</div>
						</div>
					</div>			
					
				</div>
				
			</div>

		</section>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer();