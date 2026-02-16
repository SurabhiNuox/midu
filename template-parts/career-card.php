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
				<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/map_icon.png" alt="Arrow Right" class="career-card__icon"></span>
				<?php echo esc_html( $career_location ); ?>
			</p>
		<?php endif; ?>
		<?php if ( $career_time ) : ?>
			<p class="career-card__time">
				<span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/time_icon.png" alt="Arrow Right" class="career-card__icon"></span>
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
