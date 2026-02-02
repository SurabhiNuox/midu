<?php
/**
 * Template part: Event card component (single card in a repeater/list).
 *
 * Pass via set_query_var or repeater event_card_items:
 * image, link, date_day, date_month, location, title, time
 *
 * Repeater item shape: array( 'image' => url, 'link' => url, 'date_day' => '30', 'date_month' => 'Jun', 'location' => 'Riyadh, KSA', 'title' => string, 'time' => '3:00 PM – 4:00 PM' )
 *
 * @package midu
 */

$event_image     = get_query_var( 'event_card_image' );
$event_link      = get_query_var( 'event_card_link' );
$event_date_day  = get_query_var( 'event_card_date_day' );
$event_date_month = get_query_var( 'event_card_date_month' );
$event_location  = get_query_var( 'event_card_location' );
$event_title     = get_query_var( 'event_card_title' );
$event_time      = get_query_var( 'event_card_time' );

$event_image     = $event_image ?: '';
$event_link      = $event_link ?: '#';
$event_date_day  = $event_date_day ?: '';
$event_date_month = $event_date_month ?: '';
$event_location  = $event_location ?: '';
$event_title     = $event_title ?: '';
$event_time      = $event_time ?: '';

if ( $event_image === '' ) {
	$event_image = get_template_directory_uri() . '/assets/images/news1.png';
}
?>

<article class="event-card">
	<a href="<?php echo esc_url( $event_link ); ?>" class="event-card__link">
		<div class="event-card__image-wrap">
			<img src="<?php echo esc_url( $event_image ); ?>" alt="<?php echo esc_attr( $event_title ); ?>" class="event-card__image" loading="lazy">
			<div class="event-card__overlay"></div>
			<?php if ( $event_date_day || $event_date_month ) : ?>
			<div class="event-card__date-banner">
				<?php if ( $event_date_day ) : ?><span class="event-card__date-day"><?php echo esc_html( $event_date_day ); ?></span><?php endif; ?>
				<?php if ( $event_date_month ) : ?><span class="event-card__date-month"><?php echo esc_html( $event_date_month ); ?></span><?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="event-card__body">
				<?php if ( $event_location ) : ?>
				<p class="event-card__location">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/location_icon.svg" alt="Arrow Right" class="news-card__cta-icon">
					<?php echo esc_html( $event_location ); ?>
				</p>
				<?php endif; ?>
				<?php if ( $event_title ) : ?>
				<h3 class="event-card__title"><?php echo esc_html( $event_title ); ?></h3>
				<?php endif; ?>
				<?php if ( $event_time ) : ?>
				<p class="event-card__time">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/time-icon.svg" alt="Arrow Right" class="news-card__cta-icon">
					<?php echo esc_html( $event_time ); ?>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</a>
</article>
