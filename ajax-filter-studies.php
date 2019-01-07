<?php 
  require('../../../wp-blog-header.php');
  header("HTTP/1.1 200 OK");

  $locations       = $_POST['locations'];
  $indications     = $_POST['indications'];
  $all_locations   = array();
  $all_indications = array();

  // If user selected all locations
  if ($locations === 'all' || in_array('all', $locations)) {
  	$terms = get_terms( array(
		  'taxonomy' => 'study_location',
		  'hide_empty' => false,
		));
		foreach ($terms as $term) {
			array_push($all_locations, $term->slug);
		}
		$locations = $all_locations;
  }

  // If user selected all indications
  if ($indications === 'all' || in_array('all', $indications)) {
  	$terms = get_terms( array(
		  'taxonomy' => 'indications',
		  'hide_empty' => false,
		));
		foreach ($terms as $term) {
			array_push($all_indications, $term->slug);
		}
		$indications = $all_indications;
  }

  $query = new WP_Query( array(
    'post_type'      => 'studies',
    'posts_per_page' => -1,
    'tax_query' => array(
  		array(
  			'taxonomy' => 'study_location',
  			'field'    => 'slug',
  			'terms'    => $locations,
  		),
  		array(
  			'taxonomy' => 'indications',
  			'field'    => 'slug',
  			'terms'    => $indications,
  		),
  	),
	));
	if($query->have_posts()) : 
	  while($query->have_posts()) : 
	    $query->the_post();

	    $age_range = get_field('age_range');
	    $location_object = get_field('location');
	    $location = $location_object->post_title;
	    //$indication = get_field('indication');
	    $study_indication = wp_get_post_terms( $post->ID, 'indications' );
	    $indication = $study_indication[0]->name;
?>

<div class="small-12 medium-3 cell panel" data-equalizer-watch>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">			
		
		<header class="article-header">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<h5 class="text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
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

<?php
	  endwhile;
  else: 
?>

  <h3>Sorry, no studies match your filter. Please try again.</p>

<?php endif;wp_reset_postdata(); ?>
