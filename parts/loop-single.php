<?php
/**
 * Template part for displaying a single post
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">	
		<?php if(is_singular('case_studies') ){ $ptype = get_post_type_object('case_studies'); ?>
		<h1 class="header-text xentry-title xsingle-title" itemprop="headline"><?php echo $ptype->labels->name; ?>:</h1>
		<?php } ?>
		<h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>

		<?php if(is_singular('case_studies') ){ ?>
			<div class="grid-x grid-padding-x small-up-2 medium-up-4" style="margin:20px;">
				<div class="cell text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-enroll.svg" class="study-logo">
		    		<p class="no-mar">Enrollment Goal:</p>
					<h5><?php the_field('enrollment_goal'); ?></h5>
				</div>
				<div class="cell text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-actual.svg" class="study-logo">
					<p class="no-mar">Actual Enrollment:</p>
					<h5><?php the_field('actually_enrolled'); ?></h5>
				</div>
				<div class="cell text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-random.svg" class="study-logo">
					<p class="no-mar">Goal Achieved:</p>
					<h5><?php the_field('randomized'); ?>%</h5>
				</div>
				<div class="cell text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-retention.svg" class="study-logo">
					<p class="no-mar">Retention Rate:</p>
					<h5><?php the_field('retention_rate'); ?>%</h5>
				</div>
			</div>
		<?php } ?>

		<?php if(is_singular('studies') ) { 
			$age_range = get_field('age_range');
			$location_object = get_field('location');
			$location = $location_object->post_title;
			$indication = get_field('indication'); ?>
			<div class="grid-x grid-padding-x small-up-3">
				<div class="cell"><h5 class="no-mar">Location:</h5><h5><?php echo $location; ?></h5></div>
				<div class="cell"><h5 class="no-mar">Indication:</h5><h5><?php the_field('indication'); ?></h5></div>
				<div class="cell"><h5 class="no-mar">Age Range:</h5><h5><?php the_field('age_range'); ?></h5></div>
			</div>
		<?php } ?>

		<?php //get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->
					
	<?php if(is_singular('staff') ) { 
		$staff_title = get_field('staff_title'); ?>
	<h4 class="header-text"><?php echo $staff_title; ?></h4>
	<?php } ?>
    <section class="entry-content" itemprop="text">
		<?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
	</footer> <!-- end article footer -->
						
	<?php //comments_template(); ?>	
													
</article> <!-- end article -->