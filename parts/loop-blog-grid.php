<?php
/**
 * The template part for displaying a grid of BLOG posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */

// Adjust the amount of rows in the grid
$grid_columns = 4; ?>

<?php //if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?>

    <!-- <div class="grid-x grid-margin-x grid-padding-x archive-grid" data-equalizer>  --><!--Begin Grid--> 

<?php //endif; ?> 

		<!--Item: -->
		<div class="small-12 medium-3 cell panel" data-equalizer-watch>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class('blog-grid-item'); ?> role="article">
			
				<section class="featured-image" itemprop="text">
					<?php the_post_thumbnail('thumbnail'); ?>
				</section> <!-- end article section -->
			
				<header class="article-header">
					<h4 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>	
					<?php //get_template_part( 'parts/content', 'byline' ); ?>				
				</header> <!-- end article header -->	
								
				<section class="entry-content" itemprop="text">
					<?php //the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?> 
				</section> <!-- end article section -->
								    							
			</article> <!-- end article -->
			
		</div>

<?php //if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?>

   <!-- </div> -->  <!--End Grid --> 

<?php //endif; ?>

