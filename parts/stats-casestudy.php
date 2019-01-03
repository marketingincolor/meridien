<?php
/**
 * The template part for displaying Case Study Statistics
 */
global $post;
$enrollment_goal   = [];
$actually_enrolled = [];
$randomized        = [];
$retention_rate    = [];

$arg = array(
  'post_type' => 'case_studies',
);
$posts_array = get_posts($arg);

$metaData = array();
foreach($posts_array as $key => $value){
	
    $metaData[] = get_post_meta($value->ID,'', true);
}

// Push all values into their respective array
foreach ($metaData as $value) {
	array_push($enrollment_goal, $value['enrollment_goal'][0]);
	array_push($actually_enrolled, $value['actually_enrolled'][0]);
	array_push($randomized, $value['randomized'][0]);
	array_push($retention_rate, $value['retention_rate'][0]);
}

// Sum each array
$enrollment_goal_sum   = array_sum($enrollment_goal);
$actually_enrolled_sum = array_sum($actually_enrolled);
$randomized_sum        = array_sum($randomized);
$retention_rate_sum    = array_sum($retention_rate);

// Get average of each array
$enrollment_goal_avg   = $enrollment_goal_sum / count($enrollment_goal);
$actually_enrolled_avg = $actually_enrolled_sum / count($actually_enrolled);
$randomized_avg        = $randomized_sum / count($randomized);
$retention_rate_avg    = $retention_rate_sum / count($retention_rate);
?>

<div class="casestudies-section">
	<div class="content grid-container page-content">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-12 medium-10 medium-offset-1 text-center cell">
		    	<h3>Case Studies</h3>
		    	<p>Meridien Research has always been strong in study recruitment. Learn about our results and explore detailed case studies below:</p>
			</div> 
		</div> 

		<div class="inner-content grid-x grid-margin-x grid-padding-x study-row">
		    <div class="small-12 medium-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-enroll.svg" class="study-logo">
		    	<p class="no-mar">Enrollment Goal:</p>
		    	<h5 class="alt-blue"><?php echo floor($enrollment_goal_avg); ?></h5>
			</div> 

		    <div class="small-12 medium-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-actual.svg" class="study-logo">
		    	<p class="no-mar">Actually Enrolled:</p>
		    	<h5 class="alt-blue"><?php echo floor($actually_enrolled_avg); ?></h5>
			</div>

		    <div class="small-12 medium-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-random.svg" class="study-logo">
		    	<p class="no-mar">Randomized:</p>
		    	<h5 class="alt-blue"><?php echo floor($randomized_avg); ?>%</h5>
			</div>

		    <div class="small-12 medium-3 text-center cell">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-study-icon-retention.svg" class="study-logo">
		    	<p class="no-mar">Retention Rate:</p>
		    	<h5 class="alt-blue"><?php echo floor($retention_rate_avg); ?>%</h5>
			</div>

		</div> 

		<div class="inner-content grid-x grid-margin-x grid-padding-x align-center">
		    <div class="small-8 text-center cell">
				<a href="<?php echo site_url(); ?>/case-studies" class="orange-button" style="margin-top:2em;">Read Our Case Studies</a>
			</div>
		</div>

	</div> 
</div>
