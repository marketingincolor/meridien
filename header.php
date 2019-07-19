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
		<script>templateURL = '<?php bloginfo("template_directory"); ?>';</script>
		<?php wp_head(); ?>
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '339289419781887'); 
		fbq('track', 'Purchase', {
		value: 0.00,
		currency: 'USD'
		});
		</script>
		<noscript>
		<img height="1" width="1" 
		src="https://www.facebook.com/tr?id=339289419781887&ev=PageView
		&noscript=1"/>
		</noscript>
		<!-- End Facebook Pixel Code -->
	</head>
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper" data-sticky-container>
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
							
<?php if( is_front_page() ) { ?> 
<div class="grid-container full front-header-cta">
<?php } ?>	

	<header class="header white-tp-bgnd<?php //if( is_front_page() ){ echo ' show-for-small-only'; } ?>" role="banner" id="site-header" data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="1" data-sticky-on="small">
				
		 <!-- This navs will be applied to the topbar, above all content 
			  To see additional nav styles, visit the /parts directory -->
		 <?php get_template_part( 'parts/nav', 'meridien' ); ?>

	</header> <!-- end .header -->


<?php if( is_front_page() ) { ?> 
	<div class="grid-x">
		<div class="grid-container full">
			<div class="grid-x grid-margin-x">
				<div class="cell show-for-large large-5 front-header-blue-cta">
					<h1><?php the_field('hero_title'); ?></h1>
					<?php the_field('hero_caption'); ?>
				</div>
				<div class="cell show-for-large large-7"></div>
				<div class="cell hide-for-large small-12" style="padding:12em;"></div>

			</div>
		</div>
	</div>

</div>

<div class="cell hide-for-large small-12 front-header-blue-cta" style="padding:2em !important; background-color:rgba(31, 73, 165, 1) !important; text-align:center;">
	<h1><?php the_field('hero_title'); ?></h1>
	<?php the_field('hero_caption'); ?>
</div>
<aside class="orange-line"></aside>
<a href="#top-ref" class=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sm-scroll-btn.svg" class="anchor-button"></a>

<?php } ?>	