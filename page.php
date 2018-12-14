<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */
$page_hero_meta = '&nbsp;';
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full');
get_header(); ?>

<?php if( !is_front_page() && $page_hero_image !='' ) { ?> 
	<section class="page-hero" style="background-image: url(<?php echo $page_hero_image; ?>);">
		<div class="grid-container">
			
			<div class="grid-x">
				<div class="small-10 small-offset-1 medium-8 medium-offset-1 cell">
					<h4><?php echo $page_hero_meta; ?></h4>
				</div>
			</div>

		</div>
	</section>
<?php } ?>

	<div class="content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-12 large-12 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'parts/loop', 'page' ); ?>
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php if( is_front_page() ) { ?> 
	<div class="content grid-container">
		<div class="row patient-router grid-x grid-margin-x grid-padding-x text-center">
			<div class="show-for-medium medium-6 cell">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-icon.svg" class="footer-logo">
				<h4>Patient/Volunteer Homepage</h4>
				<a href="<?php echo site_url(); ?>/patient" class="orange-button">Visit</a>
			</div>
			<div class="show-for-medium medium-6 cell">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-sponsor-icon.svg" class="footer-logo">
				<h4>Sponsor/CRO Homepage</h4>
				<a href="<?php echo site_url(); ?>/sponsor" class="orange-button">Visit</a>
			</div>
			<div class="show-for-small-only cell dk-orange-bgnd">
				<a href="<?php echo site_url(); ?>/patient" class="white-button">Visit Patient/Volunteer Homepage</a>
			</div>
			<div class="show-for-small-only cell orange-bgnd">
				<a href="<?php echo site_url(); ?>/sponsor" class="white-button">Visit Sponsor/CRO Homepage</a>
			</div>
		</div> 
	</div> 
<?php } ?>

<?php if( is_front_page() ) { ?> 
	<div class="studies-section" style="background-color:gray;">
		<div class="content grid-container">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-12 large-12 cell">
			    	<h3>Our Studies Title</h3>
			    	<p>Our studies lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
			    	<a href="" class="orange-white-button">Visit All Our Active Studies</a>
					<?php //get_template_part( 'parts/active', 'studies' ); ?>
				</div> 
			</div> 
		</div> 
	</div>
<?php } ?>

<?php if( is_front_page() || is_page( 'patient' ) ) { ?> 
<!-- 	<div class="content grid-container">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
	    <div class="testimonial-section small-12 medium-12 large-12 cell"> -->
				<?php get_template_part( 'parts/slider', 'testimonial' ); ?>
<!-- 			</div> 
		</div> 
	</div>  -->
<?php } ?>

<?php if( is_page( 'patient' ) ) { ?> 
	<div class="blog-section">
		<div class="content grid-container">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-12 large-12 cell">
			    	<h3>Our Latest Blog Posts</h3>
			    	<p>Blog post lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
				</div> 
			</div> 
		</div> 
	</div>
<?php } ?>

<?php if( is_page( 'patient' ) ) { ?> 
	<div class="form-section" style="background-color:orange;">
		<div class="content grid-container">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-12 large-12 cell">
			    	<h3>Patient Form Title</h3>
			    	<p>Patient Form lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
				</div> 
			</div> 
		</div> 
	</div>
<?php } ?>


<?php get_footer(); ?>