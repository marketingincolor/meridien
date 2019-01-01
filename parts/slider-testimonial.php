<?php
/**
 * Template part for Testimonial Slider
 *
 */
?>

<div class="content grid-container">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<div class="testimonial-section small-12 medium-10 medium-offset-1 cell">
			<h3 class="text-center">Volunteer Testimonials</h3>
			<div class="orbit" aria-label="Volunteer Testimonials" data-orbit data-timer-delay="8000">
				<ul class="orbit-container">
					<button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span><i class="fal fa-chevron-left orange"></i></button>
					<button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span><i class="fal fa-chevron-right orange"></i></button>

				<?php $testimonial_slider = get_field('site_testimonial_slider', 'option'); 
				if ( $testimonial_slider ) { 
					echo $testimonial_slider; 
				} else { ?>
					<li class="orbit-slide is-active" data-slide="0">
						<div class="single-orbit-slide">
						<p class="text-center no-mar">Temporary Placeholder Testimonial content ONE</p>
						<h4 class="text-center" style="font-size:16px; font-weight:400;">&mdash; Patient A.</h4>
						</div>
					</li>
					<li class="orbit-slide" data-slide="1">
						<div class="single-orbit-slide">
						<p class="text-center no-mar">Temporary Placeholder Testimonial content TWO</p>
						<h4 class="text-center" style="font-size:16px; font-weight:400;">&mdash; Patient B.</h4>
						</div>
					</li>
				<?php } ?>

				</ul>
				<nav class="orbit-bullets" style="display:none;">
					<button data-slide="0"><span class="show-for-sr">First slide details</span><span class="show-for-sr">Current Slide</span></button>
					<button data-slide="1"><span class="show-for-sr">Second slide details</span></button>
					<button data-slide="2"><span class="show-for-sr">Third slide details</span></button>
					<button data-slide="3"><span class="show-for-sr">Fourth slide details</span></button>
				</nav>
			</div><!-- end #orbit -->

		</div> 
	</div> 
</div> 