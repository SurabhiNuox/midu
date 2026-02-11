<?php
/**
 * Template part: Our Commitment — teal diagonal shape with text, image on right.
 *
 * Data: set_query_var( 'commitment_title', 'commitment_content', 'commitment_image' )
 * commitment_content = array of paragraph strings.
 *
 * @package midu
 */

$title   = get_query_var( 'commitment_title' ) ?: 'Our Commitment';
$content = get_query_var( 'commitment_content' );
$image   = get_query_var( 'commitment_image' ) ?: get_template_directory_uri() . '/assets/images/commitment_pic.jpg';
$btn_url   = get_query_var( 'commitment_button_url' ) ?: get_query_var( 'career_link' );
$btn_text  = get_query_var( 'commitment_button_text' ) ?: 'Download Brochure';
$btn_class = get_query_var( 'commitment_button_class' ) ?: '';

if ( ! is_array( $content ) || empty( $content ) ) {
	$content = array(
		'Every project undertaken by MIDU stands as proof of our dedication to progress, innovation, and nation-building.',
		'We partner with leading consultants, architects, and industry experts to ensure every development is delivered with reliability, excellence, and measurable impact.',
	);
}
?>

<section class="commitment-section" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="commitment-section__bg">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/peoject_graphics.png' ); ?>" alt="img" class="commitment-section__bg-image" loading="lazy">
	</div>
	<div class="commitment-section__inner">
		<div class="commitment-section__content" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
				<h2 class="commitment-section__title"><?php echo esc_html( $title ); ?></h2>
				<?php foreach ( $content as $paragraph ) : ?>
					<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
				<?php if ( ! empty( $btn_url ) ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn-primary<?php echo $btn_class ? ' ' . esc_attr( $btn_class ) : ''; ?>">
					<span class="button-text"><?php echo esc_html( $btn_text ); ?></span>
					<span class="button-icon">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="">
					</span>
				</a>
				<?php endif; ?>
			</div>
			<div class="commitment-section__image-wrap">
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="commitment-section__image" loading="lazy">
			</div>
			<div class="commitment-section__teal"></div>
		</div>
		
		
	</div>
</section>
