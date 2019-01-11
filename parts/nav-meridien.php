<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
global $post;
?>

<div class="content grid-container">
	<div class="top-bar" id="top-bar-menu">

		<div class="top-bar-left nav-logo float-left">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo.svg" class="header-logo"></a>
		</div>
		<div class="top-bar-right show-for-medium">
			<?php joints_top_nav(); ?>
		</div>
		<div class="top-bar-right nav-drop float-right show-for-small-only">
			<ul class="menu">
				<!-- <li><a data-toggle="off-canvas"><?php _e( '', 'jointswp' ); ?></a></li> -->
				<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			</ul>
		</div>

	</div>
</div>
