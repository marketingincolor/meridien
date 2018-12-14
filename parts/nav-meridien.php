<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
global $post;
?>

<?php if( is_front_page() ) { ?> 
<div class="content grid-container">
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-4 text-center">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo.svg" class="header-logo">
		</div>
	</div>
	<div class="grid-x grid-padding-x align-center">
		<div class="cell show-for-medium">
			<?php joints_top_nav(); ?>	
		</div>
	</div>
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-8 text-center">
			<h2><?php the_field('hero_title'); ?></h2>
			<p><?php the_field('hero_caption'); ?></p>
		</div>
	</div>
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-4 text-center">
			<p class="orange">Scroll To Learn More</p>
			<p class="orange"><i class="far fa-chevron-circle-down"></i></p>
		</div>
	</div>
	<?php echo $post->ID; ?>
</div>

<?php } else { ?>
<div class="content grid-container">
	<div class="top-bar" id="top-bar-menu">

		<div class="top-bar-left float-left">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo.svg" class="header-logo">
		</div>
		<div class="top-bar-right show-for-medium">
			<?php joints_top_nav(); ?>	
		</div>
		<div class="top-bar-right float-right show-for-small-only">
			<ul class="menu">
				<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
				<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
			</ul>
		</div>

	</div>
</div>
<?php } ?>







<!-- <div class="medium-3 columns" data-sticky-container>

   <div class="sidebar sticky" data-sticky data-anchor="site-header"> -->


<!-- <div data-sticky-container>
	<div class="title-bar" data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="1">
		<div class="title-bar-left">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo.svg" class="header-logo" style="height:64px;">
		</div>
		<div class="title-bar-right float-right">
			<?php joints_top_nav(); ?>	
		</div>
	</div>
</div>
 -->

