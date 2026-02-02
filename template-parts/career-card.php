<?php
/**
 * Template part: Career card (title, date, location, time/employment type, button).
 * Pass via set_query_var or repeater career_card_items: title, date, location, time, link.
 *
 * Repeater item: array( 'title' => string, 'date' => string, 'location' => string, 'time' => string, 'link' => url )
 *
 * @package midu
 */

$career_title    = get_query_var( 'career_card_title' );
$career_date     = get_query_var( 'career_card_date' );
$career_location = get_query_var( 'career_card_location' );
$career_time     = get_query_var( 'career_card_time' );
$career_link     = get_query_var( 'career_card_link' );

$career_title    = $career_title ?: '';
$career_date     = $career_date ?: '';
$career_location = $career_location ?: '';
$career_time     = $career_time ?: '';
$career_link     = $career_link ?: '#';
?>

<article class="career-card">
	<div class="career-card__inner">
	<div class="career-card__title_main">
		<?php if ( $career_title ) : ?>
			<h3 class="career-card__title"><?php echo esc_html( $career_title ); ?></h3>
		<?php endif; ?>
		<?php if ( $career_date ) : ?>
			<p class="career-card__date"><?php echo esc_html( $career_date ); ?></p>
		<?php endif; ?>
		</div>
		<div class="career-card__location_main">
		<?php if ( $career_location ) : ?>
			<p class="career-card__location">
				<svg class="career-card__icon" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="9" r="2.5" stroke="currentColor" stroke-width="2"/></svg>
				<?php echo esc_html( $career_location ); ?>
			</p>
		<?php endif; ?>
		<?php if ( $career_time ) : ?>
			<p class="career-card__time">
				<svg class="career-card__icon" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
				<?php echo esc_html( $career_time ); ?>
			</p>
		<?php endif; ?>
		</div>
		<a href="<?php echo esc_url( $career_link ); ?>" class="btn-primary">
			<span class="button-text">Job details</span>
			<span class="button-icon">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Arrow Right">
									</span>
		</a>
	</div>
</article>
