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
												About
					    						<?php joints_footer_links(); ?>
					    					</nav>
										</div>
										<div class="small-12 medium-auto cell">
											<nav role="navigation">
												Patients
					    						<?php joints_footer_links_two(); ?>
					    					</nav>
										</div>
										<div class="small-12 medium-auto cell">
											<nav role="navigation">
												Services
					    						<?php joints_footer_links_three(); ?>
					    					</nav>
										</div>
										<div class="small-12 medium-4 cell">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/site-logo.png" class="footer-logo">
											Site Address
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
									<p class="terms"><a href="#">Terms & Conditions</a></p>
								</div>

								<div class="small-12 medium-3 large-3 cell">
									<p class="privacy"><a href="#">Privacy Policy</a></p>
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