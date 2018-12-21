<?php
/**
 * The template part for displaying Case Study Statistics
 */
global $post;

$arg = array(
    'post_type' => 'case_studies',
);
$posts_array = get_posts($arg);

$metaData = array();
foreach($posts_array as $key => $value){
    $metaData[] = get_post_meta($value->ID,'', true);
}
//print_r($metaData);
?>


<div class="casestudies-section">
	<div class="content grid-container page-content">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-12 medium-10 medium-offset-1 text-center cell">
		    	<h3>Case Studies</h3>
		    	<p>Meridien Research has always been strong in study recruitment. Learn about our results and explore detailed case studies below:</p>
			</div> 
		</div> 

		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-enroll.svg" class="study-logo">
		    	<p class="no-mar">Enrollment Goal:</p>
		    	<h5 class="alt-blue">250</h5>
			</div> 

		    <div class="small-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-actual.svg" class="study-logo">
		    	<p class="no-mar">Actually Enrolled:</p>
		    	<h5 class="alt-blue">60</h5>
			</div>

		    <div class="small-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-random.svg" class="study-logo">
		    	<p class="no-mar">Randomized:</p>
		    	<h5 class="alt-blue">240%</h5>
			</div>

		    <div class="small-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-retention.svg" class="study-logo">
		    	<p class="no-mar">Retention Rate:</p>
		    	<h5 class="alt-blue">93%</h5>
			</div>

		</div> 

		<div class="inner-content grid-x grid-margin-x grid-padding-x align-center">
		    <div class="small-8 text-center cell">
				<a href="<?php echo site_url(); ?>/case-studies" class="orange-button" style="margin-top:2em;">Read Our Case Studies</a>
			</div>
		</div>

	</div> 
</div>
