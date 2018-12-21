<?php
/**
 * Displays archive pages if a specific template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ($post_type == 'studies' ) {
	$age_range = get_field('age_range');
	$location_object = get_field('location');
	$location = $location_object->post_title;
	$indication = get_field('indication');
}
get_header(); ?>
			
	<div class="content grid-container archive-content-margin">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		
		    <main class="main small-12 medium-12 cell" role="main">
			    
		    	<!-- <header>
		    		<h1 class="page-title"><?php the_archive_title();?></h1>
		    						<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		    	</header> -->
		

				<div class="grid-x grid-padding-x">
					<div class="cell small-12 text-center">
						<h2 class="page-lead semi-font blue">Current Studies</h2>
						<p>The following studies are available:</p>
					</div>
				</div>
				<div class="grid-x grid-padding-x small-up-2 medium-up-4">

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php //get_template_part( 'parts/loop', 'archive' ); ?>

					<div class="cell">
					<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">			
						
						<header class="article-header">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
							<h5 class="text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						</header> <!-- end article header -->
										
						<section class="entry-content" itemprop="text">
							<?php if ($post_type == 'studies' ) { ?>
							<div class="grid-x">
								<div class="small-12 cell">
									<h6 class="no-mar">Location: <?php echo $location; ?></h6>
								</div>
								<div class="small-12 cell">
									<h6 class="no-mar">Indication: <?php echo $indication; ?></h6>
								</div>
								<div class="small-12 cell">
									<h6 class="no-mar">Age Range: <?php echo $age_range; ?></h6>
								</div>
							</div>
							<?php } ?>
						</section> <!-- end article section -->
											
						<footer class="article-footer">
					    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
						</footer> <!-- end article footer -->	
									    						
					</article> <!-- end article -->
					</div>


				<?php endwhile; ?>	

					<?php //joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		

				</div>




















			</main> <!-- end #main -->
	
			<?php //get_sidebar(); ?>
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>