<?php
/**
 * Displays STAFF archive page
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
$archive_staff_title = get_field('staff_section_title', 'option');
$archive_staff_content = get_field('staff_section_content', 'option');
get_header(); ?>
			
	<div class="content grid-container archive-content-margin">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-12 cell" role="main">
			    
				<div class="grid-x grid-padding-x align-center">
					<div class="cell small-12 medium-10 REMOVEmedium-offset-1 text-center">
						<h2 class="page-lead semi-font blue"><?php echo $archive_staff_title; ?></h2>
						<?php echo $archive_staff_content; ?>
					</div>
				</div>	

				<div class="grid-x grid-margin-x archive-grid archive-staff" data-equalizer>
		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'staff-grid' ); ?>
				    
				<?php endwhile; ?>	

					<?php //joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    </div> <!-- end #inner-content -->
	    <?php joints_page_navi(); ?>
	</div> <!-- end #content -->

<?php get_footer(); ?>