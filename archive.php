<?php
/**
 * Displays archive pages if a specific template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>
			
	<div class="content grid-container archive-content-margin">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		
		    <main class="main small-12 medium-12 cell" role="main">
			    <?php echo do_shortcode('[searchandfilter hide_empty="0" fields="indications" types="multiselect" headings="Indication" submit_label="Filter" post_types="post" add_search_param="0"]'); ?>

		    	<!-- <header>
		    		<h1 class="page-title"><?php the_archive_title();?></h1>
		    						<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		    	</header> -->
		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
				    
















































				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	
			<?php //get_sidebar(); ?>
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>