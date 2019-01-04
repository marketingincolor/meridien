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

<?php if( is_single() && has_term( 'patient', 'category' ) ) { ?> 
	<?php 
	$term_list = wp_get_post_terms($post->ID, 'indications', array("fields" => "all"));
	$term_slug = $term_list[0]->slug;
	$display_shortcode_tax = '[display-posts taxonomy="indications" tax_term="' . $term_slug . '" wrapper="div" wrapper_class="display-posts-listing grid-x small-up-1 medium-up-3 grid-margin-x grid-padding-x" posts_per_page="3" order="ASC" orderby="date" image_size="thumbnail" exclude_current="true"]';
	$execute_code = do_shortcode($display_shortcode_tax); 
		//if( $execute_code != '' ) { 
	?>
	<div class="blog-section">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-10 medium-offset-1 text-center cell">
			    	<h3>Related Posts</h3>
			    	<?php if( $execute_code != '' ) { ?>
			    	<p>You might be interested in these related Blog Posts</p>
					<?php echo $execute_code; ?>
				<?php } else { ?>
			    	<p>There are no Related Blog Posts at this time</p>
				<?php } ?>
					<a href="<?php echo site_url(); ?>/blog/patient" class="orange-button">View All Blog Posts</a>
				</div> 
			</div> 
		</div> 
	</div>
	<?php //} ?>
<?php } ?>

<?php if( (is_single() && has_term( 'sponsor-cro', 'category' )) || is_singular('case_studies') ) { ?> 
	<div class="sponsor-form cta-section orange-bgnd">
		<div class="content grid-container">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
				<div class="small-12 medium-8 medium-offset-2 text-center cell">
			    	<h3>Contact Us</h3>
			    	<p>If you'd like more information about what Meridien Research can do for your company, simply contact us using the form below.</p>
				</div> 
				<div class="small-12 medium-8 medium-offset-2 text-center cell">	
			    	<?php echo do_shortcode('[ninja_form id=3]'); ?>
				</div> 
			</div> 
		</div> 
	</div>
<?php } ?>


<?php get_footer(); ?>