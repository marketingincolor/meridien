<?php
/**
 * Displays archive pages if a specific template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
$archive_title = 'Blog/Archive Title';//get_field('study_section_title', 'option');
$archive_content = 'Blog/Archive Content';//get_field('study_section_content', 'option');
get_header(); ?>
			
	<div class="content grid-container archive-content-margin">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-12 cell" role="main">

				<div class="grid-x grid-padding-x">
					<div class="cell small-12 text-center">
						<h2 class="page-lead semi-font blue"><?php echo $archive_title; ?></h2>
					</div>
					<div class="cell small-12 medium-10 medium-offset-1 text-center">
						<?php echo $archive_content; ?>
					</div>
					<div class="cell small-12 text-center">
						<?php echo do_shortcode('[searchandfilter hide_empty="0" fields="indications" types="multiselect" headings="Indication" submit_label="Filter" post_types="post" add_search_param="0"]'); ?>
						<form action="<?php echo site_url('/case-studies/'); ?>" method="post" class="searchandfilter reset"><input type="submit" value="Clear"></form>
					</div>
				</div>

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
				<?php endwhile; ?>	
					<?php joints_page_navi(); ?>
				<?php else : ?>			
					<?php get_template_part( 'parts/content', 'missing' ); ?>
				<?php endif; ?>
		
			</main> <!-- end #main -->
	    </div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php get_footer(); ?>