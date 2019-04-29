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
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
				</section> <!-- end article section -->
			
				<header class="article-header">
					<h4 class="title" style="padding-bottom:0; margin-bottom:0;"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>	
				<?php $staff_title = get_field('staff_title'); 
					if ($staff_title) { ?> 
					<h4 class="title" style="padding:0; font-weight:600; font-size:1rem;"><?php echo $staff_title; ?></h4>
				<?php } ?>
				</header> <!-- end article header -->	
								    							
			</article> <!-- end article -->
			
		</div>
