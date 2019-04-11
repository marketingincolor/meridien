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

				<div class="grid-x grid-padding-x">
					<div class="cell small-12 text-center">
						<h2 class="page-lead semi-font blue">Current Studies</h2>
					</div>
					<div class="cell small-12 text-center">

						<form>
						  <div class="grid-x grid-margin-x grid-margin-y">
								<div class="medium-6 cell">
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
							
								<div class="medium-6 cell">
									<label>Locations
										<select class="" name="locations" id="locations-select" multiple>
											<option value="all" selected>All Locations</option>
											
												<?php
													$terms = get_terms( array(
													    'taxonomy' => 'study_location',
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
									<button id="filter-studies" class="orange-button" type="submit">Filter Studies</button>
								</div>
						  </div>
						</form>

					</div>
					<div class="cell small-12 text-center">
						<p>The following studies are available:</p>
					</div>
				</div>

				<div id="results-container" class="grid-x grid-margin-x page-grid" data-equalizer> 

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php 
						$age_range = get_field('age_range');
						$location_object = get_field('location');
						$location = $location_object->post_title;
						$study_indication = wp_get_post_terms( $post->ID, 'indications' );
						$indication = $study_indication[0]->name;
					 ?>

					<!-- <div class="cell"> -->
					<div class="small-12 medium-3 cell panel" data-equalizer-watch>

					<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">			
						
						<header class="article-header">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							<h5 class="text topem"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						</header> <!-- end article header -->
										
						<section class="entry-content" itemprop="text">
							<?php //if ($post_type == 'studies' ) { ?>
							<div class="grid-x entry-content-meta">
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

			<div class="page-navigation">
				<?php
				the_posts_pagination( array(
					'screen_reader_text' => ' ',
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) ); ?>

			</div>

	    </div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php get_footer(); ?>