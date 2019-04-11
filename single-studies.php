<?php 
/**
 * The template for displaying all single posts and attachments
 */
$page_hero_meta = '&nbsp;';
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full');
get_header(); ?>

<?php if( is_single() && $page_hero_image !='' ) { ?> 
	<section class="single-hero" style="background-image: url(<?php echo $page_hero_image; ?>);">
		<div class="grid-container">
			
			<div class="grid-x">
				<div class="small-10 small-offset-1 medium-8 medium-offset-1 cell">
					<h4><?php echo $page_hero_meta; ?></h4>
				</div>
			</div>

		</div>
	</section>
<?php } ?>
<div class="content grid-container page-content page-content-margin">
	<?php //if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<main class="main small-12 medium-10 medium-offset-1 cell" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    	<?php get_template_part( 'parts/loop', 'single' ); ?>
		    <?php endwhile; else : ?>
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>
		    <?php endif; ?>

		</main> <!-- end #main -->
		<?php //get_sidebar(); ?>
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php if( is_single() ) { ?> 
<div class="patient-form cta-section orange-bgnd">
	<div class="content grid-container page-content">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-12 medium-10 medium-offset-1 text-center cell">
		    	<h3>Interested in participating in this study?</h3>
		    	<p>Please complete this Patient Form.</p>
		    </div>
		    <div class="small-12 medium-8 medium-offset-2 text-center cell">	
		    	<?php echo do_shortcode('[ninja_form id=1]'); ?>
			</div> 
		</div> 
	</div> 
</div>


<div class="content grid-container page-content-margin show-for-medium">
	<div class="row patient-router grid-x grid-margin-x grid-padding-x text-center">
		<div class="show-for-medium medium-6 cell has-bar">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-benefits-icon.svg" class="cta-icon">
			<h4 class="header-text">Benefits of Volunteering</h4>
			<a href="<?php echo site_url(); ?>/patients/why-volunteer/" class="orange-button">Visit</a>
		</div>
		<div class="show-for-medium medium-6 cell">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-faqs-icon.svg" class="cta-icon">
			<h4 class="header-text">Frequently Asked Questions</h4>
			<a href="<?php echo site_url(); ?>/faq" class="orange-button">Visit</a>
		</div>
	</div> 
</div> 

<div class="content">
	<div class="row patient-router-alt grid-x text-center">
		<div class="show-for-small-only cell dk-orange-bgnd cta-mobile">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-benefits-icon-mobile.svg" class="cta-icon">
			<a href="<?php echo site_url(); ?>/patients/why-volunteer/" class="white-button" style="font-weight:600;">Benefits of Volunteering</a>
		</div>
		<div class="show-for-small-only cell orange-bgnd cta-mobile">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-faqs-icon-mobile.svg" class="cta-icon">
			<a href="<?php echo site_url(); ?>/faq" class="white-button" style="font-weight:600;">Frequently Asked Questions</a>
		</div>
	</div> 
</div> 

<?php } ?>




<?php get_footer(); ?>