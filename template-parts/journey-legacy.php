<?php
/**
 * Template part: Our Journey & Legacy
 * Horizontal timeline with years, nav arrows, and content cards (image + text + image).
 *
 * @package midu
 */

$events = array(
	array(
		'year'        => '2018',
		'subtitle'   => 'MIDU Founded',
		'title'       => 'A Vision to Shape Saudi Development',
		'description' => 'MIDU was established with a clear ambition to contribute to Saudi Arabia\'s growth through innovative development solutions. The foundation year focused on defining strategic goals, building core expertise, and laying the groundwork for long-term impact.',
		'image'       => get_template_directory_uri() . '/assets/images/timeline_1.jpg',
	),
	array(
		'year'        => '2020',
		'subtitle'   => 'Transformation',
		'title'       => 'Adapting to Change with Resilience',
		'description' => 'The year 2020 represented a period of transformation and adaptability. MIDU embraced change by refining its strategies, enhancing operational resilience, and continuing to deliver value despite evolving market and global challenges.',
		'image'       => get_template_directory_uri() . '/assets/images/timeline_2.jpg',
	),
	array(
		'year'        => '2021',
		'subtitle'   => 'Growth & Impact',
		'title'       => 'A Vision to Shape Saudi Development',
		'description' => 'MIDU was established with a clear ambition to contribute to Saudi Arabia\'s growth through innovative development solutions. The foundation year focused on defining strategic goals, building core expertise, and laying the groundwork for long-term impact.',
		'image'       => get_template_directory_uri() . '/assets/images/timeline_3.jpg',
	),
	array(
		'year'        => '2022',
		'subtitle'   => 'Today & Beyond',
		'title'       => 'Adapting to Change with Resilience',
		'description' => 'The year 2020 represented a period of transformation and adaptability. MIDU embraced change by refining its strategies, enhancing operational resilience, and continuing to deliver value despite evolving market and global challenges.',
		'image'       => get_template_directory_uri() . '/assets/images/timeline_4.jpg',
	),
);
?>

<section class="journey-legacy" aria-label="Our Journey & Legacy">
	<div class="journey-legacy__bg" aria-hidden="true"></div>
	<div class="journey-legacy__inner">
		<div class="container">
			<div class="journey-legacy__header">
				<h2 class="second_title journey-legacy__title">Our Journey & Legacy</h2>
				<div class="journey-legacy__nav" aria-label="Timeline navigation">
					<button type="button" class="journey-legacy__nav-btn journey-legacy__nav-btn--prev" aria-label="Previous year">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/left_arw.png" alt="Previous year">
					</button>
					<button type="button" class="journey-legacy__nav-btn journey-legacy__nav-btn--next" aria-label="Next year">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/right_arw.png" alt="Next year">
					</button>
				</div>
			</div>
		</div>
		<div class="journey-legacy__timeline-wrap">
				<div class="journey-legacy__timeline-bar" aria-hidden="true"></div>
				<div class="journey-legacy__years" role="tablist">
					<?php foreach ( $events as $i => $event ) : ?>
					<button type="button" class="journey-legacy__year<?php echo $i === 0 ? ' is-active' : ''; ?>" data-index="<?php echo (int) $i; ?>" role="tab" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-label="Year <?php echo esc_attr( $event['year'] ); ?>">
						<span class="journey-legacy__year-dot" aria-hidden="true"></span>
						<span class="journey-legacy__year-label"><?php echo esc_html( $event['year'] ); ?></span>
					</button>
					<?php endforeach; ?>
				</div>
			</div>
		<div class="journey-legacy__timeline">
			

			<div class="journey-legacy__cards-wrap">
				<div class="swiper journey-legacy-swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $events as $i => $event ) : ?>
						<div class="swiper-slide journey-legacy__card-set" data-index="<?php echo (int) $i; ?>">
							<div class="journey-legacy__card journey-legacy__card--image">
								<img src="<?php echo esc_url( $event['image'] ); ?>" alt="<?php echo esc_attr( $event['title'] ); ?>" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>">
							</div>
							<div class="journey-legacy__card journey-legacy__card--text">
								<span class="journey-legacy__card-subtitle"><?php echo esc_html( $event['subtitle'] ); ?></span>
								<div class="journey-legacy__card-content">
									<h3 class="journey-legacy__card-title"><?php echo esc_html( $event['title'] ); ?></h3>
									<p><?php echo esc_html( $event['description'] ); ?></p>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
