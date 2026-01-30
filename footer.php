<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package midu
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<!-- Top Section: Navigation Links & Social Media -->
			<div class="footer-top">
				<div class="footer-top-content">
					<!-- Left Column: Navigation Links -->
					<div class="footer-nav-column">
						<nav class="footer-navigation">
							<ul class="footer-nav-list">
								<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
								<li><a href="<?php echo esc_url(home_url('/about')); ?>">About MIDU</a></li>
								<li><a href="<?php echo esc_url(home_url('/sectors')); ?>">Sectors</a></li>
								<li><a href="<?php echo esc_url(home_url('/projects')); ?>">Projects</a></li>
							</ul>
						</nav>
					</div>

					<!-- Center Column: Navigation Links -->
					<div class="footer-nav-column">
						<nav class="footer-navigation">
							<ul class="footer-nav-list">
								<li><a href="<?php echo esc_url(home_url('/sustainability')); ?>">Sustainability</a></li>
								<li><a href="<?php echo esc_url(home_url('/news-media')); ?>">News & Media</a></li>
								<li><a href="<?php echo esc_url(home_url('/careers')); ?>">Careers</a></li>
								<li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
							</ul>
						</nav>
					</div>

					<!-- Right: Social Media Icons -->
					<div class="footer-social">
						<a href="#" class="social-icon" aria-label="LinkedIn">
							<span class="icon-linkedin"></span>
						</a>
						<a href="#" class="social-icon" aria-label="Twitter/X">
							<span class="icon-twitter"></span>
						</a>
						<a href="#" class="social-icon" aria-label="Instagram">
							<span class="icon-Instagram"></span>
						</a>
						<a href="#" class="social-icon" aria-label="YouTube">
							<span class="icon-YouTube"></span>
						</a>
					</div>
				</div>
			</div>

			<!-- Separator Line -->
			<div class="footer-separator"></div>

			<!-- Middle Section: Logo & Contact Info -->
			<div class="footer-middle">
				<div class="footer-middle-content">
					<!-- Left: Logo -->
					<div class="footer-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-image">
						</a>
					</div>

					<!-- Right: Contact Information -->
					<div class="footer-contact-info">
						<div class="contact-item">
							<span class="contact-label">Email:</span>
							<a href="mailto:info@midu.sa" class="contact-value">info@midu.sa</a>
						</div>
						<div class="contact-item">
							<span class="contact-label">Phone:</span>
							<a href="tel:+961123456789" class="contact-value">+961 123 456 789</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Separator Line -->
			<div class="footer-separator"></div>

			<!-- Bottom Section: Copyright & Legal Links -->
			<div class="footer-bottom">
				<div class="footer-bottom-content">
					<!-- Left: Copyright -->
					<div class="footer-copyright">
						<p>&copy; <?php echo date('Y'); ?> MIDU. All rights reserved. <span>| </span> All Rights Reserved</p>
					</div>

					<!-- Right: Legal Links -->
					<div class="footer-legal">
						<a href="<?php echo esc_url(home_url('/terms')); ?>">Terms and Conditions</a>
						<span class="separator">|</span>
						<a href="<?php echo esc_url(home_url('/privacy')); ?>">Privacy Policy</a>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
