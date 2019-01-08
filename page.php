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

<div class="front-page-header header-cta">
	<div class="content grid-container" style="padding-top:45px;">
		<div class="grid-x grid-padding-x align-center show-for-medium">
			<div class="cell medium-4 text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo.svg" class="header-logo">
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="cell show-for-medium">
				<?php joints_top_nav(); ?>	
			</div>
		</div>
		<div class="grid-x grid-margin-y">
			<div class="cell small-8 small-offset-2 medium-6 medium-offset-3 large-4 large-offset-4 show-for-medium" style="margin-top:30px">
				<form method="get" class="drop-search">
					<input type="text" name="s" placeholder="Search Site">
				</form>
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
				<p class="orange" style="margin-bottom:2em;"><a id="ref-link" href="#top-ref" data-smooth-scroll><i class="far fa-chevron-circle-down"></i></a></p>
			</div>
		</div>
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
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-10 medium-offset-1 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'parts/loop', 'page' ); ?>
				  
				  <?php if(is_page('faq')) { ?>
				  	<?php get_template_part( 'parts/loop', 'faq-accordion' ); ?>
				  <?php } ?>
				  
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->



<?php if( is_page( 'patient-blog' ) || is_page( 'cro-blog' ) ) { 
	$display_category = '';
	if( is_page( 'patient-blog' ) ) { $display_category = 'patient'; }
	if( is_page( 'cro-blog' ) ) { $display_category = 'sponsor-cro'; }
	?> 

	<div class="content grid-container page-content page-content-margin">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-10 medium-offset-1 cell" role="main">

				<?php $_GET += array('newscat' => null); //$selected = $_GET['newscat']; ?>
				<h4>Choose A Category <?php //echo html_entity_decode( $_GET['newscat'], ENT_QUOTES ); ?></h4>
				<form action="" method="GET" id="newslist">
					<select name="newscat" id="newscat" onchange="submit();">
						<option value="" <?php echo ($_GET['newscat'] == '') ? ' selected="selected"' : ''; ?>>Show all</option>
						<?php // TODO: something here is glitching the 's with some indications - needs another method?
						    $categories = get_categories('taxonomy=indications&post_type=post'); 
						    foreach ($categories as $category) : 
						    echo '<option value="'.$category->name.'"';
						    echo ($_GET['newscat'] == $category->name ) ? ' selected="selected"' : '';
						    echo '>'.$category->name.'</option>';
						    endforeach; 
						?>
					</select>
				</form>

				<div class="grid-x grid-margin-x page-grid" data-equalizer> 
					<?php // let the queries begin 
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;  
					if( !isset($_GET['newscat']) || $_GET['newscat'] == '' ) {
					    $newslist = new WP_Query( array(
					    'post_type' => 'post',
					    'category_name' => $display_category, 
					    'posts_per_page' => 4,
					    'order' => 'ASC',
					    'paged' => $paged
					    ) ); 
					} else { //if select value exists (and isn't 'show all'), the query that compares $_GET value and taxonomy term (name)
					    $newscategory = $_GET['newscat']; //get sort value
					    $newslist = new WP_Query( array(
					    'post_type' => 'post',
					    'category_name' => $display_category,
					    'posts_per_page' => 4,
					    'order' => 'ASC',
					    'paged' => $paged,
					    'tax_query' => array(
					        array(
					        'taxonomy' => 'indications',
					        'field' => 'name',
					        'terms' => $newscategory
					        ) 
					    ) 
					    ));
					}
					if ($newslist->have_posts()) :
					while ( $newslist->have_posts() ) : $newslist->the_post(); 
					?>
						<?php get_template_part( 'parts/loop', 'blog-grid' ); ?>

					<?php endwhile; ?>
					</div>

					<div class="blog-pagination">
					    <?php 
					        echo paginate_links( array(
					            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					            'total'        => $newslist->max_num_pages,
					            'current'      => max( 1, get_query_var( 'paged' ) ),
					            'format'       => '?paged=%#%',
					            'show_all'     => false,
					            'type'         => 'plain',
					            'end_size'     => 2,
					            'mid_size'     => 1,
					            'prev_next'    => true,
					            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
					            'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
					            'add_args'     => false,
					            'add_fragment' => '',
					        ) );
					    ?>
					<?php else : 
						echo 'There are no news items in that category.'; ?>
					<?php endif; ?>  
					</div>
					<?php wp_reset_query(); ?>


			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php } ?>

<?php if( is_front_page() ) { ?> 
	<div class="content grid-container show-for-medium">
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
				<a href="<?php echo site_url(); ?>/patients" class="white-button" style="font-weight:600;">Visit Patient Homepage</a>
			</div>
			<div class="show-for-small-only cell orange-bgnd cta-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-sponsor-icon-mobile.svg" class="cta-icon">
				<a href="<?php echo site_url(); ?>/sponsors" class="white-button" style="font-weight:600;">Visit Sponsor/CRO Homepage</a>
			</div>
		</div> 
	</div> 
<?php } ?>

<?php if( is_front_page() ) { ?> 
	<?php get_template_part( 'parts/feed', 'studies' ); ?>
<?php } ?>

<?php if( is_page( 'patients' ) ) { ?> 

	<div class="content grid-container show-for-medium">
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
				<a href="<?php echo site_url(); ?>/studies" class="white-button" style="font-weight:600;">View Active Studies In Your Area</a>
			</div>
			<div class="show-for-small-only cell orange-bgnd cta-mobile">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-patient-vol-icon-mobile.svg" class="cta-icon">
				<a href="<?php echo site_url(); ?>/patients/why-volunteer" class="white-button" style="font-weight:600;">Why Volunteer for a Meridien Study</a>
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
			    	<a href="<?php echo site_url(); ?>/studies" class="orange-white-button">Find Active Studies in your area</a>
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
			    	<h3><?php echo get_field('patient_blog_section_title', 'option'); ?></h3>
			    	<?php echo get_field('patient_blog_section_content', 'option'); ?>

					<?php echo do_shortcode('[display-posts category="patient" wrapper="div" wrapper_class="display-posts-listing grid-x small-up-1 medium-up-3 grid-margin-x align-center grid-padding-x" posts_per_page="3" order="ASC" orderby="date" image_size="thumbnail"]'); ?>

					<a href="<?php echo site_url(); ?>/blog/patient" class="orange-button topspace">View All Blog Posts</a>

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
						<ul class="services-list">
							<li>Endocrinology</li>
							<li>Mental Health</li>
							<li>Dermatology</li>
							<li>Men’s Health</li>
						</ul>
						</div>
						<div class="small-6 cell">
						<ul class="services-list">
							<li>Cardiology</li>
							<li>CNS</li>
							<li>Internal Medicine</li>
							<li>Women’s Health</li>
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
			    	<h3><?php echo get_field('sponsor_blog_section_title', 'option'); ?></h3>
			    	<?php echo get_field('sponsor_blog_section_content', 'option'); ?>

					<?php echo do_shortcode('[display-posts category="sponsor-cro" wrapper="div" wrapper_class="display-posts-listing grid-x small-up-1 medium-up-3 grid-margin-x align-center grid-padding-x" posts_per_page="3" order="ASC" orderby="date" image_size="thumbnail"]'); ?>

					<a href="<?php echo site_url(); ?>/blog/sponsor-cro" class="orange-button topspace">View All Blog Posts</a>

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

<?php if( is_page( 'corporate-events' ) ) { ?> 
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