<?php 
  require('../../../wp-blog-header.php');
  header("HTTP/1.1 200 OK");

  $indications = $_POST['indications'];
  $category    = $_POST['category'];
  $all_indications = array();

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
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'category_name'  => $category,
    'tax_query' => array(
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
?>

      <?php get_template_part( 'parts/loop', 'archive-grid' ); ?>

<?php
	  endwhile;
  else: 
?>

  <h3>Sorry, no blogs match your filter. Please try again.</p>

<?php endif;wp_reset_postdata(); ?>
