<?php 
/**
 * The template for displaying all single posts and attachments
 */
get_header(); ?>

<div class="content grid-container page-content page-content-margin">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<div class="staff-photo small-12 medium-3 cell">
			<?php echo the_post_thumbnail('medium'); ?>
		</div>
		<main class="main small-12 medium-9 cell" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    	<?php get_template_part( 'parts/loop', 'single' ); ?>
		    <?php endwhile; else : ?>
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>
		    <?php endif; ?>

		</main> <!-- end #main -->
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>