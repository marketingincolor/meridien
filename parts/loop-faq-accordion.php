<ul class="accordion" data-accordion data-allow-all-closed="true">

	<?php
	  $query = new WP_Query( array(
	    'post_type'      => 'faqs',
	    'posts_per_page' => -1
		));
		if($query->have_posts()) : 
		  while($query->have_posts()) : 
		    $query->the_post();
	?>

	<li class="accordion-item" data-accordion-item>
	  <a href="#" class="faq-accordion-title"><strong><?php the_title(); ?></strong></a>
	  <div class="accordion-content" data-tab-content>
	    <?php the_content(); ?>
	  </div>
	</li>

	<?php endwhile;endif;wp_reset_postdata(); ?>

</ul>