<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>
<div class="off-canvas position-right" id="off-canvas" data-off-canvas>

	<div class="content grid-container white-tp-bgnd">
		<div class="top-bar" id="top-bar-menu">
			<div class="top-bar-left nav-logo float-left">
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo-color.svg" class="header-logo"></a>
			</div>
			<div class="top-bar-right nav-drop float-right show-for-small-only">
				<ul class="menu">
					<li><a class="orange" data-toggle="off-canvas" style="font-size:2em; padding:0;"><i class="far fa-times"></i></a></li>
					<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				</ul>
			</div>
		</div>
	</div>	

	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<div class="small-8 small-offset-2 text-center cell">
			<?php joints_off_canvas_nav(); ?>
		</div>
	</div>

	<div class="grid-x grid-margin-y">
		<div class="cell small-8 small-offset-2 medium-6 medium-offset-3 large-4 large-offset-4" style="margin-top:30px">
			<form method="get" class="drop-search">
				<input type="text" name="s" placeholder="Search Site" style="border-radius:25px; height:32px;">
			</form>
		</div>
	</div>









	<?php //if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php //dynamic_sidebar( 'offcanvas' ); ?>

	<?php //endif; ?>


<!-- 	<br><br>
<i class="far fa-times"></i>
<br><br>
<button class="menu-icon" type="button" data-toggle="off-canvas"></button> -->
</div>
