<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>
<!doctype html>
  <html class="no-js"  <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/awesome.css">
		<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/slider.css"> -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper" <?php if( ! is_front_page() ){ echo 'data-sticky-container'; } ?> >
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" <?php if( ! is_front_page() ){ echo 'data-off-canvas-content'; } ?> >
				
				<header class="header blue-bgnd<?php if( is_front_page() ){ echo ' front-page-header'; } ?>" role="banner" id="site-header" <?php if( !is_front_page() ){ echo 'data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="1"'; } /*elseif ( is_front_page() ){ echo 'style="background-image: url('. get_template_directory_uri() .'/assets/images/mrg-img-hdr-hero-desk.jpg);"'; }*/ ?>>
					<!-- This navs will be applied to the topbar, above all content 
					To see additional nav styles, visit the /parts directory -->
					<?php //get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
					<?php get_template_part( 'parts/nav', 'meridien' ); ?>
	 	
				</header> <!-- end .header -->

<!--  style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/mrg-img-hdr-hero-desk.jpg);" -->

				<!-- <div class="medium-3 columns" data-sticky-container>

   <div class="sidebar sticky" data-sticky data-anchor="site-header"> -->