<?php
/* Template Name: Landing Page Template */
// Fully customized to allow for completely custom layouts 

if (get_field('landing_page_header')) {
	$page_header = get_field('landing_page_header');
}else{
	//field is empty, do not show
}
if (get_field('landing_page_hero')) {
	$page_hero = get_field('landing_page_hero');
}else{
	//field is empty, do not show
}
if (get_field('landing_page_primary_content')) {
	$page_primary = get_field('landing_page_primary_content');
}else{
	//field is empty, do not show
}
if (get_field('landing_page_secondary_content')) {
	$page_secondary = get_field('landing_page_secondary_content');
}else{
	//field is empty, do not show
}
if (get_field('landing_page_tertiary_content')) {
	$page_tertiary = get_field('landing_page_tertiary_content');
}else{
	//field is empty, do not show
}
if (get_field('landing_page_footer')) {
	$page_footer = get_field('landing_page_footer');
}else{
	//field is empty, do not show';
}
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
<?php
if (get_field('disable_defaults')) {
	// remove all Theme Default scripts and content
}else{ ?>		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/awesome.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
		<script>templateURL = '<?php bloginfo("template_directory"); ?>';</script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/dist/assets/images/madico-favicon.png">
<?php } ?>

<?php
if (get_field('landing_page_meta')) {
		$landing_meta = get_field('landing_page_meta');
		$revised_meta = strip_tags($landing_meta, '<meta><title></title><style></style><script></script><link>');
		echo $revised_meta;
}else{
	//$page_meta = 'Landing Page Meta<br>';
}
?>

<?php
if (get_field('disable_wp_head')) {
	// do not process wp_head();
}else{
	wp_head();
}
?>

<?php
if (get_field('disable_defaults')) {
	// remove all Theme Default scripts and content
}else{ ?>	
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
<?php } ?>

</head>
<body  <?php body_class('landing-page'); ?>>

<?php echo $page_header . $page_hero . $page_primary . $page_secondary . $page_tertiary . $page_footer; ?>

<?php
if (get_field('disable_defaults')) {
	// remove all Theme Default scripts and content
}else{ ?>	

<?php } ?>

<?php
if (get_field('disable_wp_footer')) {
	// do not process wp_footer();
}else{
	wp_footer();
}
?>

<?php
if (get_field('landing_page_script')) {
		$landing_script = get_field('landing_page_script');
		$revised_script = strip_tags($landing_script, '<script></script>');
		echo $revised_script;
}else{
	//$page_meta = 'Landing Page Meta<br>';
}
?>

</body>
</html>
