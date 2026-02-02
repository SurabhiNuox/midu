<?php
/**
 * Template part: News card component (single card in a repeater/list).
 *
 * Data source (one of):
 * - Repeater: pass news_card_items (array of image, link, title, date) on the page; each row outputs one card.
 * - WP loop: use inside a post loop; uses featured image, permalink, title, date.
 * - Single: set_query_var( 'news_card_image', 'news_card_link', 'news_card_title', 'news_card_date' ) then include this part.
 *
 * Repeater item shape: array( 'image' => url, 'link' => url, 'title' => string, 'date' => string )
 *
 * @package midu
 */

$card_image  = get_query_var('news_card_image');
$card_date   = get_query_var('news_card_date');
$card_title  = get_query_var('news_card_title');
$card_link   = get_query_var('news_card_link');

if ( $card_image === '' || $card_image === false ) {
	$card_image = get_the_post_thumbnail_url( null, 'large' );
}
if ( $card_date === '' || $card_date === false ) {
	$card_date = get_the_date( 'd F Y' );
}
if ( $card_title === '' || $card_title === false ) {
	$card_title = get_the_title();
}
if ( $card_link === '' || $card_link === false ) {
	$card_link = get_the_permalink();
}

$card_image = $card_image ?: '';
$card_link  = $card_link ?: '#';

// Fallback image when no featured image / no URL passed
if ( $card_image === '' ) {
	$card_image = get_template_directory_uri() . '/assets/images/news1.png';
}
?>

<article class="news-card">
	<a href="<?php echo esc_url( $card_link ); ?>" class="news-card__link">
		<div class="news-card__image-wrap">
			<img src="<?php echo esc_url( $card_image ); ?>" alt="<?php echo esc_attr( $card_title ?: '' ); ?>" class="news-card__image" loading="lazy">
		</div>
		<div class="news-card__body">
			<?php if ( $card_date ) : ?>
				<span class="news-card__date"><?php echo esc_html( $card_date ); ?></span>
			<?php endif; ?>
			<?php if ( $card_title ) : ?>
				<h3 class="news-card__title"><?php echo esc_html( $card_title ); ?></h3>
			<?php endif; ?>
			<span class="news-card__cta">
				Learn More
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/line-arrow.svg" alt="Arrow Right" class="news-card__cta-icon">
			</span>
		</div>
	</a>
</article>
