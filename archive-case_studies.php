<?php
/**
 * Displays archive pages if a specific template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
$archive_study_title = get_field('study_section_title', 'option');
$archive_study_content = get_field('study_section_content', 'option');
get_header(); ?>
			
	<div class="content grid-container archive-content-margin">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-12 cell" role="main">

				<div class="grid-x grid-padding-x">
					<div class="cell small-12 text-center">
						<h2 class="page-lead semi-font blue"><?php echo $archive_study_title; ?></h2>
					</div>
					<div class="cell small-12 medium-10 medium-offset-1 text-center">
						<?php echo $archive_study_content; ?>
					</div>
					<div class="cell small-12 text-center">

						<form>
						  <div class="grid-x grid-margin-x grid-margin-y">
								<div class="medium-6 medium-offset-3 small-10 small-offset-1 cell">
									<label>Indications
										<select class="" name="indications" id="indications-select" multiple>
											<option value="all" selected>All Indications</option>

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
								<div class="small-12 cell">
									<button id="filter-case-studies" class="orange-button" type="submit">Filter Case Studies</button>
								</div>
						  </div>
						</form>

					</div>
				</div>

				<!-- <div class="grid-x grid-padding-x grid-margin-x small-up-2 medium-up-4"> -->
				<div id="case-study-grid" class="grid-x grid-margin-x page-grid" data-equalizer> 

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php 
						$enrollment_goal = get_field('enrollment_goal');
						$actually_enrolled = get_field('actually_enrolled');
						$randomized = get_field('randomized');
						$retention_rate = get_field('retention_rate');
						$location = $location_object->post_title;
						$case_study_indication = wp_get_post_terms( $post->ID, 'indications' );
						$indication = $case_study_indication[0]->name;
					 ?>

					<!-- <div class="cell"> -->
					<div class="small-12 medium-3 cell panel" data-equalizer-watch>

					<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">			
						
						<header class="article-header">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small'); ?></a>
							<h5 class="text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						</header> <!-- end article header -->
										
						<section class="entry-content" itemprop="text">
							<?php //if ($post_type == 'studies' ) { ?>
							<div class="grid-x entry-content-meta">
								<div class="small-12 cell">
									<h6 class="no-mar">Enrollment Goal: <?php echo $enrollment_goal; ?></h6>
								</div>
								<div class="small-12 cell">
									<h6 class="no-mar">Actually Enrolled: <?php echo $actually_enrolled; ?></h6>
								</div>
								<div class="small-12 cell">
									<h6 class="no-mar">Randomized: <?php echo $randomized; ?></h6>
								</div>
								<div class="small-12 cell">
									<h6 class="no-mar">Retention Rate: <?php echo $retention_rate; ?></h6>
								</div>

								<div class="small-12 cell">
									<h6 class="no-mar">Indication: <?php echo $indication; ?></h6>
								</div>
							</div>
							<?php //} ?>
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
	    </div> <!-- end #inner-content -->
	</div> <!-- end #content -->

	<div class="cta-section orange-bgnd">
		<div class="content grid-container">
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			    <div class="small-12 medium-8 medium-offset-2 text-center cell">
			    	<h3>Contact Us</h3>
			    	<p>If you'd like more information about what Meridien Research can do for your company, simply contact us using the form below.</p>
				</div> 
				<div class="small-12 medium-8 medium-offset-2 text-center cell">	
			    	<?php echo do_shortcode('[ninja_form id=3]'); ?>
				</div> 
			</div> 
		</div> 
	</div>

<?php get_footer(); ?>