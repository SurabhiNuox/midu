<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package midu
 */

get_header();
?>

<main id="primary" class="site-main error-404-page">
	<?php
	set_query_var( 'banner_title', __( 'Page Not Found', 'midu' ) );
	set_query_var( 'banner_bg_image', get_template_directory_uri() . '/assets/images/careers-banner.jpg' );
	get_template_part( 'template-parts/inner-banner' );
	?>

	<div class="main_content">
		<section class="error-404-section">
			<div class="container">
				<div class="error-404-content">
					<p class="error-404-code">404</p>
					<h2 class="second_title"><?php esc_html_e( 'Page Not Found', 'midu' ); ?></h2>
					<p class="error-404-text"><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'midu' ); ?></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">
						<span class="button-text"><?php esc_html_e( 'Back to Home', 'midu' ); ?></span>
					</a>
				</div>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();
