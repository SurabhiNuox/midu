<?php
/**
 * Template part: Sector What We Do card — icon + title + description.
 *
 * Data: set_query_var( 'sector_wwd_card_icon', 'sector_wwd_card_title', 'sector_wwd_card_description', 'sector_wwd_card_delay' )
 *
 * @package midu
 */

$icon        = get_query_var( 'sector_wwd_card_icon' ) ?: '';
$title       = get_query_var( 'sector_wwd_card_title' ) ?: '';
$description = get_query_var( 'sector_wwd_card_description' ) ?: '';
$delay       = (int) get_query_var( 'sector_wwd_card_delay' );
?>

<article class="sector-what-we-do-card" data-aos="fade-up" data-aos-duration="600" data-aos-once="true"<?php echo $delay > 0 ? ' data-aos-delay="' . $delay . '"' : ''; ?>>
	<div class="sector-what-we-do-card__inner">
		<?php if ( $icon ) : ?>
			<div class="sector-what-we-do-card__icon-wrap">
				<img src="<?php echo esc_url( $icon ); ?>" alt="" aria-hidden="true" class="sector-what-we-do-card__icon" loading="lazy">
			</div>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<h3 class="sector-what-we-do-card__title"><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p class="sector-what-we-do-card__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div>
</article>
