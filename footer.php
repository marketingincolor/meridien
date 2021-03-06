<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">
					
					<div class="upper-footer-bg">
						
						<div class="grid-container">

							<div class="inner-footer grid-x grid-margin-x grid-padding-x">
								
								<div class="small-12 medium-12 large-12 cell">

									<div class="grid-x grid-margin-x">
										<div class="small-12 medium-auto cell">
											<nav role="navigation">
					    						<?php joints_footer_links(); ?>
					    					</nav>
										</div>
										<div class="small-12 medium-auto cell">
											<nav role="navigation">
					    						<?php joints_footer_links_two(); ?>
					    					</nav>
										</div>
										<div class="small-12 medium-auto cell">
											<nav role="navigation">
					    						<?php joints_footer_links_three(); ?>
					    					</nav>
										</div>
										<div class="small-12 medium-4 cell">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-logo-color.svg" class="footer-logo">
											<h6 class="no-mar">Meridien Research Corporate</h6>
											<h6 class="no-mar">1201 S. Orlando Avenue, Suite #362</h6>
											<h6 class="no-mar">Winter Park, FL 32789</h6>
											<h6 class="show-for-medium">813-540-6000</h6>
											<h6 class="show-for-small-only"><a href="tel:813-563-6009" style="text-decoration:underline;">813-563-6009</a></h6>
											<p style="margin-top:1em;">
												<a href='<?php the_field('facebook_link', 'option'); ?>'>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-fb.svg" class="social-logo" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-fb-alt.svg'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-fb.svg'"></a>
												<a href='<?php the_field('twitter_link', 'option'); ?>'>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-tw.svg" class="social-logo" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-tw-alt.svg'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-tw.svg'"></a>
												<a href='<?php the_field('linkedin_link', 'option'); ?>'>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-li.svg" class="social-logo" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-li-alt.svg'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-li.svg'"></a>
												<a href='<?php the_field('instagram_link', 'option'); ?>'>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-ig.svg" class="social-logo" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-ig-alt.svg'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/mrg-footer-ico-ig.svg'"></a>
											</p>
										</div>
									</div>

								</div>
								
							</div> <!-- end #inner-footer -->
						
						</div>

					</div>

					<div class="lower-footer-bg">
						
						<div class="grid-container">

							<div class="inner-footer grid-x grid-margin-x grid-padding-x">
								
								<div class="small-12 medium-3 large-3 cell">
									<p class="terms"><a href="<?php echo site_url(); ?>/terms-conditions">Terms & Conditions</a></p>
								</div>

								<div class="small-12 medium-3 large-3 cell">
									<p class="privacy"><a href="<?php echo site_url(); ?>/privacy-policy">Privacy Policy</a></p>
								</div>
								
								<div class="small-12 medium-6 large-6 cell text-right">
									<p class="source-org copyright">Copyright &reg; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
								</div>
							
							</div> <!-- end #inner-footer -->
						
						</div>

					</div>



				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->