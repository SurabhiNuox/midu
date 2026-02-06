<?php
/**
 * Template part: Social card component (single card in a repeater).
 * Data: set via query vars per item (social_card_link, social_card_image, social_card_title, social_card_description).
 *
 * @package midu
 */

$card_link        = get_query_var( 'social_card_link' );
$card_image       = get_query_var( 'social_card_image' );
$card_title       = get_query_var( 'social_card_title' );
$card_description = get_query_var( 'social_card_description' );

$card_link  = $card_link ?: '#';
$card_title = $card_title ?: '';
$card_description = $card_description ?: '';

if ( $card_image && strpos( $card_image, '://' ) === false ) {
	$card_image = get_template_directory_uri() . '/assets/images/' . ltrim( $card_image, '/' );
}
if ( ! $card_image ) {
	$card_image = get_template_directory_uri() . '/assets/images/social1.png';
}
?>

<article class="social-card">
	<a href="<?php echo esc_url( $card_link ); ?>" class="news-card__link">
		<div class="social-card__image-wrap">
			<img src="<?php echo esc_url( $card_image ); ?>" alt="<?php echo esc_attr( $card_title ?: 'Social Card' ); ?>" loading="lazy">
		</div>
		<div class="social-card__body">
			<div class="social-card-content">
			<?php if ( $card_title ) : ?>
				<h3><?php echo esc_html( $card_title ); ?></h3>
			<?php endif; ?>
			<?php if ( $card_description ) : ?>
				<p><?php echo esc_html( $card_description ); ?></p>
			<?php endif; ?>
			</div>
		</div>
	</a>
</article>
