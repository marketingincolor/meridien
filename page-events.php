<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */
$page_hero_meta = '&nbsp;';
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full');
get_header(); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>

<?php if( $page_hero_image !='' ) { ?> 
	<section class="page-hero" style="background-image: url(<?php echo $page_hero_image; ?>);">
		<div class="grid-container">
			
			<div class="grid-x">
				<div class="small-10 small-offset-1 medium-8 medium-offset-1 cell">
					<h4><?php echo $page_hero_meta; ?></h4>
				</div>
			</div>

		</div>
	</section>
<?php } ?>

	<div class="content grid-container page-content page-content-margin"  id="top-ref">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-12 medium-10 medium-offset-1 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'parts/loop', 'page' ); ?>
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->

	<div class="content grid-container page-content page-content-margin" >
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="main small-12 medium-10 medium-offset-1 text-center cell">
				<div class="fb-page" data-href="https://www.facebook.com/MeridienResearch/" data-tabs="events" data-width="500" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/MeridienResearch/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MeridienResearch/">Meridien Research</a></blockquote></div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>