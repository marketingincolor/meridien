<?php
/**
 * The template part for displaying a grid of STAFF Custom Post Types
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */
?>
		<!--Item: -->
		<div class="small-12 medium-3 text-center cell panel" data-equalizer-watch>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class('staff-grid-item'); ?> role="article">
			
				<section class="featured-image" itemprop="text">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				</section> <!-- end article section -->
			
				<header class="article-header">
					<h4 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>	
			
				</header> <!-- end article header -->	
								
				<section class="entry-content" itemprop="text">
					<?php //the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?> 
				</section> <!-- end article section -->
								    							
			</article> <!-- end article -->
			
		</div>
