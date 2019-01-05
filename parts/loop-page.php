<?php
/**
 * Template part for displaying page content in page.php
 */
?>
<?php if( !is_front_page() ) { ?> 
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-12 medium-10 REMOVEmedium-offset-1 text-center">
			<h2 class="page-lead semi-font blue"><?php the_field('hero_title'); ?></h2>
			<p><?php the_field('hero_caption'); ?></p>
		</div>
	</div>
<?php } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<!-- <header class="article-header">
	 	<h1 class="page-title"><?php //the_title(); ?></h1>
	 </header> --> <!-- end article header -->
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 <?php wp_link_pages(); ?>
	</footer> <!-- end article footer -->
						    
	<?php //comments_template(); ?>
					
</article> <!-- end article -->