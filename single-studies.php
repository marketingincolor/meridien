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
		    	<h3>Interested in partcipating in this study?</h3>
		    	<p>Please complete this Patient Form.</p>
		    </div>
		    <div class="small-12 medium-8 medium-offset-2 text-center cell">	
		    	<?php echo do_shortcode('[ninja_form id=1]'); ?>
			</div> 
		</div> 
	</div> 
</div>
<?php } ?>




<?php get_footer(); ?>