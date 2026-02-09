<?php
/**
 * Template part: What We Do card — icon + title.
 *
 * Data: set_query_var( 'wwd_card_icon', 'wwd_card_title' )
 *
 * @package midu
 */

$icon  = get_query_var( 'wwd_card_icon' ) ?: '';
$title = get_query_var( 'wwd_card_title' ) ?: '';
$delay = (int) get_query_var( 'wwd_card_delay' );
?>

<article class="what-we-do-card" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"<?php echo $delay > 0 ? ' data-aos-delay="' . $delay . '"' : ''; ?>>
	<div class="what-we-do-card__inner">
		<?php if ( $icon ) : ?>
			<div class="what-we-do-card__icon-wrap">
				<img src="<?php echo esc_url( $icon ); ?>" alt="" aria-hidden="true" class="what-we-do-card__icon" loading="lazy">
			</div>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<h3 class="what-we-do-card__title"><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>
	</div>
</article>
