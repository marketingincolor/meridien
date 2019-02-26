<?php
/**
 * Template part for Studies Feed, content stored on SITE OPTIONS page (ACF)
 *
 */
$feed_studies_title = get_field('studies_section_title', 'option');
$feed_studies_content = get_field('studies_section_content', 'option');
?>
<div class="studies-section">
	<div class="content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-12 medium-7 cell">
		    	<h3><?php echo $feed_studies_title; ?></h3>
		    	<?php echo $feed_studies_content; ?>
			</div> 
		</div> 
	</div> 
</div>