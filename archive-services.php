<?php
/**
 * Displays archive pages if a specific template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
$archive_services_title = get_field('services_section_title', 'option');
$archive_services_content = get_field('services_section_content', 'option');
get_header(); ?>
			
	<div class="content grid-container archive-content-margin">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-12 cell" role="main">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 text-center">
						<h2 class="page-lead semi-font blue"><?php echo $archive_services_title; ?></h2>
					</div>
					<div class="cell small-12 medium-10 medium-offset-1 text-center">
						<?php echo $archive_services_content; ?>
					</div>
				</div>
		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-services' ); ?>
				    
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