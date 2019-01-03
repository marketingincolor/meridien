<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
if ($post_type == 'services' ) {

}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">			
	
	<header class="article-header">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
	</header> <!-- end article header -->
					
	<section class="entry-content" itemprop="text">
		<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<?php //the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?>
		<?php the_excerpt(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
    	<p class="tags"><?php //the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->	
				    						
</article> <!-- end article -->