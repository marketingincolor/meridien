<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */
$page_hero_meta = '&nbsp;';
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full');
get_header(); ?>

<?php if( is_front_page() ) { ?> 
<!-- 	<section class="page-hero" style="">
	<div class="grid-container">
		
		<div class="grid-x">
			<div class="small-10 small-offset-1 medium-8 medium-offset-1 cell">
				<h4><?php echo $page_hero_meta; ?>INSERT SPECIAL HOME PAGE BLUE HEADER HERE</h4>
			</div>
		</div>

	</div>
</section> -->

<div class="front-page-header header-cta">
	<div class="content grid-container" style="padding-top:45px;">
		<div class="grid-x grid-padding-x align-center show-for-medium">
			<div class="cell medium-4 text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo.svg" class="header-logo">
			</div>
		</div>
		<div class="grid-x grid-padding-x align-center">
			<div class="cell show-for-medium">
				<?php joints_top_nav(); ?>	
			</div>
		</div>
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-10 medium-8 text-center key-space">
				<h2><?php the_field('hero_title'); ?></h2>
				<p><?php the_field('hero_caption'); ?></p>
			</div>
		</div>
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-4 text-center">
				<p class="orange show-for-medium no-mar">Scroll To Learn More</p>
				<p class="orange" style="margin-bottom:2em;"><a href="#top-ref"><i class="far fa-chevron-circle-down"></i></a></p>
			</div>
		</div>
		<?php //echo $post->ID; ?>
	</div>
</div>

<?php } ?>


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
	<div class="content grid-container page-content page-content-margin">
		<?php //if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-10 medium-offset-1 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'parts/loop', 'page' ); ?>
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php if( is_front_page() ) { ?> 
	<div class="content grid-container">
		<div class="row patient-router grid-x grid-margin-x grid-padding-x text-center">
			<div class="show-for-medium medium-6 cell has-bar">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-icon.svg" class="cta-icon">
				<h4 class="header-text">Patient/Volunteer Homepage</h4>
				<a href="<?php echo site_url(); ?>/patients" class="orange-button">Visit</a>
			</div>
			<div class="show-for-medium medium-6 cell">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-sponsor-icon.svg" class="cta-icon">
				<h4 class="header-text">Sponsor/CRO Homepage</h4>
				<a href="<?php echo site_url(); ?>/sponsors" class="orange-button">Visit</a>
			</div>
		</div> 
	</div> 

	<div class="content">
		<div class="row patient-router-alt grid-x text-center">
			<div class="show-for-small-only cell dk-orange-bgnd cta-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-icon-mobile.svg" class="cta-icon">
				<a href="<?php echo site_url(); ?>/patients" class="white-button">Visit Patient Homepage</a>
			</div>
			<div class="show-for-small-only cell orange-bgnd cta-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-sponsor-icon-mobile.svg" class="cta-icon">
				<a href="<?php echo site_url(); ?>/sponsors" class="white-button">Visit Sponsor/CRO Homepage</a>
			</div>
		</div> 
	</div> 
<?php } ?>

<?php if( is_front_page() ) { ?> 
	<?php get_template_part( 'parts/feed', 'studies' ); ?>
<?php } ?>

<?php if( is_page( 'patients' ) ) { ?> 

	<div class="content grid-container">
		<div class="row patient-subrouter grid-x grid-margin-x grid-padding-x text-center">
			<div class="show-for-medium medium-6 cell has-bar">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-study-icon.svg" class="cta-icon">
				<h4 class="header-text">Ready to See Our Available Studies in Your Area?</h4>
				<a href="<?php echo site_url(); ?>/studies" class="orange-button">View Active Studies</a>
			</div>
			<div class="show-for-medium medium-6 cell">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-vol-icon.svg" class="cta-icon">
				<h4 class="header-text">Want to Learn More About Meridien's Volunteer Experience?</h4>
				<a href="<?php echo site_url(); ?>/patients/why-volunteer" class="orange-button">Why Volunteer</a>
			</div>
		</div> 
	</div> 

	<div class="content">
		<div class="row patient-router-alt grid-x text-center">
			<div class="show-for-small-only cell dk-orange-bgnd cta-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-study-icon-mobile.svg" class="cta-icon">
				<a href="<?php echo site_url(); ?>/studies" class="white-button">View Active Studies In Your Area</a>
			</div>
			<div class="show-for-small-only cell orange-bgnd cta-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-vol-icon-mobile.svg" class="cta-icon">
				<a href="<?php echo site_url(); ?>/patients/why-volunteer" class="white-button">Why Volunteer for a Meridien Study</a>
			</div>
		</div> 
	</div> 





	<div class="benefits-section">
		<div class="content grid-container">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-7 cell">
			    	<h3 style="margin-bottom:1em;">What are the Benefits of Volunteering for a Study?</h3>
			    	<p>Volunteers in reasearch studies participate in the development of medical therapies that may offer better treatments and even cures for life-threatening and chronic diseases. Possible benefits for volunteers:</p>
			    	<ul style="margin-bottom:2em;">
			    		<li>Play an active rolve in their health care.</li>
			    		<li>Gain access to research treatments before they are widely available.</li>
			    		<li>Obtain medical care at health care facilities during the trial.</li>
			    		<li>Help others by contributing to medical research.</li>
			    	</ul>
			    	<a href="../studies" class="orange-white-button">Find Active Studies in your area</a>
					<?php //get_template_part( 'parts/active', 'studies' ); ?>
				</div> 
			</div> 
		</div> 
	</div>
<?php } ?>

<?php if( is_front_page() || is_page( 'patients' ) ) { ?> 
<!-- 	<div class="content grid-container">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
	    <div class="testimonial-section small-12 medium-12 large-12 cell"> -->
				<?php get_template_part( 'parts/slider', 'testimonial' ); ?>
<!-- 			</div> 
		</div> 
	</div>  -->
<?php } ?>

<?php if( is_page( 'patients' ) ) { ?> 
	<div class="blog-section">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-10 medium-offset-1 text-center cell">
			    	<h3>Our Latest Blog Posts</h3>
			    	<p>Blog post lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>

					<?php echo do_shortcode('[display-posts category="patient" wrapper="div" wrapper_class="display-posts-listing grid-x small-up-1 medium-up-3 grid-margin-x grid-padding-x" posts_per_page="3" order="ASC" orderby="date" image_size="thumbnail"]'); ?>

					<a href="<?php echo site_url(); ?>/patients/patient-blog" class="orange-button">View All Blog Posts</a>

				</div> 
			</div> 
		</div> 
	</div>

	<div class="patient-form cta-section orange-bgnd">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-10 medium-offset-1 text-center cell">
			    	<h3>Interested in partcipating in a study?</h3>
			    	<p>Please complete this Patient Form.</p>
			    </div>
			    <div class="small-12 medium-8 medium-offset-2 text-center cell">	
			    	<?php echo do_shortcode('[ninja_form id=1]'); ?>
				</div> 
			</div> 
		</div> 
	</div>
<?php } ?>

<?php if( is_page( 'sponsors' ) ) { ?> 

	<div class="services-section">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-10 medium-offset-1 text-center cell">
			    	<h3>Our Services</h3>
			    	<p>With six dedicated research sites strategically located throughout central Florida, Meridien Research can help get you to your recruitment goals.</p>
			    	<p>Meridien Research investigators are board certified and specialists in:</p>
			    	<div class="grid-x">
			    		<div class="small-6 cell">
						<ul>
							<li>Endocrinology</li>
							<li>Mental Health</li>
							<li>Dermatology</li>
							<li>Internal Medicine</li>
						</ul>
						</div>
						<div class="small-6 cell">
						<ul>
							<li>Cardiology</li>
							<li>CNS</li>
							<li>Men’s & Women’s Health</li>
						</ul>
						</div>
					</div>
					


				</div> 
			</div> 
		</div> 
	</div>

	<?php get_template_part( 'parts/stats', 'casestudy' ); ?>

	<div class="blog-section">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-10 medium-offset-1 text-center cell">
			    	<h3>Our Latest Blog Posts</h3>
			    	<p>Blog post lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta sem malesuada magna mollis euismod.</p>

					<?php echo do_shortcode('[display-posts category="sponsor-cro" wrapper="div" wrapper_class="display-posts-listing grid-x small-up-1 medium-up-3 grid-margin-x grid-padding-x" posts_per_page="3" order="ASC" orderby="date" image_size="thumbnail"]'); ?>

					<a href="<?php echo site_url(); ?>/sponsors/cro-blog" class="orange-button">View All Blog Posts</a>

				</div> 
			</div> 
		</div> 
	</div>

<?php } ?>

<?php if( is_page( 'about' ) ) { ?> 
	<div class="trials-section">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x">
			    <div class="small-12 medium-10 medium-offset-1 cell">
					<?php the_field('trials_content'); ?>
				</div>
			</div>
		</div> 
	</div>

	<div class="excellence-section">
		<div class="content grid-container page-content">
			<div class="inner-content grid-x">
			    <div class="small-12 medium-10 medium-offset-1 cell">
					<?php the_field('commitment_content'); ?>
				</div>
			</div>
		</div> 
	</div>
<?php } ?>

<?php if( is_page( 'why-volunteer' ) ) { ?> 

	<?php get_template_part( 'parts/feed', 'studies' ); ?>
	<?php get_template_part( 'parts/slider', 'testimonial' ); ?>

<?php } ?>





<?php get_footer(); ?>