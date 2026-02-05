<?php
/**
 * Template part: CTA Banner
 * Teal banner with two-line statement and Contact button; angled cut on top-right.
 *
 * @package midu
 */

$cta_line1 = 'Driving transformative projects';
$cta_line2 = 'for the Kingdom\'s future.';
$cta_btn_text = 'Contact';
$cta_btn_url = home_url( '/contact' );
?>

<section class="cta-banner" aria-label="Call to action">
	<div class="container cta-banner__inner">
		<div class="cta-banner__shape">
			<p>
				<strong><?php echo esc_html( $cta_line1 ); ?></strong>
				<span><?php echo esc_html( $cta_line2 ); ?></span>
			</p>
			<a href="<?php echo esc_url( $cta_btn_url ); ?>" class="btn-primary">
				<span class="button-text"><?php echo esc_html( $cta_btn_text ); ?></span>
				 <span class="button-icon">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="" width="16" height="16" aria-hidden="true">
				</span>
			</a>
		</div>
	</div>
</section>
