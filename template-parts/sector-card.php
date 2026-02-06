<?php
/**
 * Template part: Sector card component (single card in a grid).
 *
 * Data source: set_query_var( 'sector_card_image', 'sector_card_title', 'sector_card_description', 'sector_card_link' )
 *
 * @package midu
 */

$card_image = get_query_var('sector_card_image');
$card_title = get_query_var('sector_card_title');
$card_description = get_query_var('sector_card_description');
$card_link = get_query_var('sector_card_link');

$card_image = $card_image ?: '';
$card_title = $card_title ?: '';
$card_description = $card_description ?: '';
$card_link = $card_link ?: '#';
?>

<article class="sector-card">
	<a href="<?php echo esc_url( $card_link ); ?>" class="sector-card__link">
		<div class="sector-card__image-wrap">
			<?php if ( $card_image ) : ?>
				<img src="<?php echo esc_url( $card_image ); ?>" alt="<?php echo esc_attr( $card_title ?: '' ); ?>" class="sector-card__image" loading="lazy">
			<?php endif; ?>
			<div class="sector-card__image-overlay"></div>
		</div>
		<div class="sector-card__body">
			<?php if ( $card_title ) : ?>
				<h3 class="sector-card__title"><?php echo esc_html( $card_title ); ?></h3>
			<?php endif; ?>
			<?php if ( $card_description ) : ?>
				<p><?php echo esc_html( $card_description ); ?></p>
			<?php endif; ?>
		</div>
	</a>
</article>
