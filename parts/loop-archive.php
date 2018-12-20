<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
if ($post_type == 'studies' ) {
	$age_range = get_field('age_range');
	$location_object = get_field('location');
	$location = $location_object->post_title;
	$indication = get_field('indication');
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">			
	
	<header class="article-header">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php //get_template_part( 'parts/content', 'byline' ); ?>
		<div class="grid-x grid-margin-x grid-padding-x">
			<div class="small-4 cell">
				<h6 class="no-mar">Location:</h6>
				<h6><?php echo $location; ?></h6>
			</div>
			<div class="small-4 cell">
				<h6 class="no-mar">Indication:</h6>
				<h6><?php echo $indication; ?></h6>
			</div>
			<div class="small-4 cell">
				<h6 class="no-mar">Age Range:</h6>
				<h6><?php echo $age_range; ?></h6>
			</div>
		</div>
	</header> <!-- end article header -->
					
	<section class="entry-content" itemprop="text">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->	
				    						
</article> <!-- end article -->