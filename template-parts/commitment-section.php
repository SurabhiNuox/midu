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
		<div class="commitment-section__content">
				<h2 class="commitment-section__title"><?php echo esc_html( $title ); ?></h2>
				<?php foreach ( $content as $paragraph ) : ?>
					<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
			</div>
			<div class="commitment-section__image-wrap">
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="commitment-section__image" loading="lazy">
			</div>
			<div class="commitment-section__teal"></div>
		</div>
		
		
	</div>
</section>
