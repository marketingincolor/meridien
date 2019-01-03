<?php 
  require('../../../wp-blog-header.php');
  header("HTTP/1.1 200 OK");

  $indications = $_POST['indications'];
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
    'post_type'      => 'case_studies',
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

      <?php 
        $enrollment_goal       = get_field('enrollment_goal');
        $actually_enrolled     = get_field('actually_enrolled');
        $randomized            = get_field('randomized');
        $retention_rate        = get_field('retention_rate');
        $location              = $location_object->post_title;
        $case_study_indication = wp_get_post_terms( $post->ID, 'indications' );
        $indication            = $case_study_indication[0]->name;
       ?>

      <div class="small-12 medium-3 cell panel" data-equalizer-watch>

      <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">      
        
        <header class="article-header">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small'); ?></a>
          <h5 class="text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
        </header> <!-- end article header -->
                
        <section class="entry-content" itemprop="text">
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

<?php
	  endwhile;
  else: 
?>

  <h3>Sorry, no case studies match your filter. Please try again.</p>

<?php endif;wp_reset_postdata(); ?>
