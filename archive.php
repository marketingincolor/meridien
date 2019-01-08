<?php
/**
 * Displays archive pages if a specific template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
$url = $_SERVER['REQUEST_URI'];
if (strpos($url, 'patient') !== false) {
  $archive_title = 'Patient Blog';//get_field('study_section_title', 'option');
  $archive_content = 'Stay up to date with our current posts for Patients';//get_field('study_section_content', 'option');
  $archive_label = 'Blog Posts';
}else if (strpos($url, 'sponsor-cro') !== false) {
  $archive_title = 'CRO Blog';//get_field('study_section_title', 'option');
  $archive_content = 'Stay up to date with our current posts for Sponsors / CROs';//get_field('study_section_content', 'option');
  $archive_label = 'Blog Posts';
} else if (strpos($url, 'news') !== false) {
  $archive_title = 'News Posts';//get_field('study_section_title', 'option');
  $archive_content = 'Stay up to date with our current News items';//get_field('study_section_content', 'option');
  $archive_label = 'News Posts';
} else {
  $archive_title = 'Blog';//get_field('study_section_title', 'option');
  $archive_content = 'Stay up to date with our current posts';//get_field('study_section_content', 'option');
  $archive_label = 'Blog Posts';
}



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
					<div class="cell medium-6 medium-offset-3 text-center">
						<!-- form here -->
						<label>Indications
							<select class="" name="indications" id="indications-select" multiple>
								<option value="all" selected>All <?php echo $archive_label; ?></option>

								<?php
									$terms = get_terms( array(
									    'taxonomy' => 'indications',
									    'hide_empty' => false,
									));
									foreach ($terms as $term) {
								?>
													
								<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
													
							  <?php } ?>
							</select>
						</label>
					</div>
					<div class="small-12 cell text-center">
						<button id="filter-blogs" class="orange-button" type="submit">Filter</button>
					</div>
				</div>
				<div id="archive-grid" class="grid-x grid-margin-x archive-grid" data-equalizer>

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
				<?php endwhile; ?>	
					<?php joints_page_navi(); ?>
				<?php else : ?>			
					<?php get_template_part( 'parts/content', 'missing' ); ?>
				<?php endif; ?>
		
				</div>
			</main> <!-- end #main -->
	    </div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php get_footer(); ?>