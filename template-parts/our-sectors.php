<?php
/**
 * Template part: Our Sectors
 * Central "Our Sectors" circle with four sector cards (Industrial, Mining, Contracting, Water Solutions).
 *
 * @package midu
 */

$sectors = array(
	array(
		'title'       => 'Industrial',
		'description' => 'Enhancing manufacturing and logistics ecosystems.',
		'link'        => home_url( '/sectors#industrial' ),
		'icon'        => 'industrial',
		'position'    => 'top-left',
	),
	array(
		'title'       => 'Mining',
		'description' => 'Developing strategic natural resource opportunities.',
		'link'        => home_url( '/sectors#mining' ),
		'icon'        => 'mining',
		'position'    => 'top-right',
	),
	array(
		'title'       => 'Contracting',
		'description' => 'Delivering critical infrastructure and built environment solutions.',
		'link'        => home_url( '/sectors#contracting' ),
		'icon'        => 'contracting',
		'position'    => 'bottom-left',
	),
	array(
		'title'       => 'Water Solutions',
		'description' => 'Supporting sustainable water management and treatment.',
		'link'        => home_url( '/sectors#water-solutions' ),
		'icon'        => 'water',
		'position'    => 'bottom-right',
	),
);
?>

<section class="our-sectors" aria-label="Our Sectors">
	<div class="our-sectors__bg" aria-hidden="true"></div>
	<div class="container our-sectors__inner">
		<h2 class="second_title our-sectors__title">A Diversified Portfolio That Contributes To National Growth And Resilience.</h2>

		<div class="our-sectors__hub">
			<div class="our-sectors__center">
				<span class="our-sectors__center-ring" aria-hidden="true"></span>
				<span class="our-sectors__center-label">Our Sectors</span>
			</div>
			<?php foreach ( $sectors as $sector ) : ?>
			<div class="our-sectors__line our-sectors__line--<?php echo esc_attr( $sector['position'] ); ?>" aria-hidden="true"></div>
			<?php endforeach; ?>

			<?php foreach ( $sectors as $sector ) : ?>
			<a href="<?php echo esc_url( $sector['link'] ); ?>" class="our-sectors__card our-sectors__card--<?php echo esc_attr( $sector['position'] ); ?>" aria-label="<?php echo esc_attr( $sector['title'] ); ?>">
				<span class="our-sectors__card-icon our-sectors__card-icon--<?php echo esc_attr( $sector['icon'] ); ?>" aria-hidden="true"></span>
				<h3 class="our-sectors__card-title"><?php echo esc_html( $sector['title'] ); ?></h3>
				<p class="our-sectors__card-desc"><?php echo esc_html( $sector['description'] ); ?></p>
			</a>
			<?php endforeach; ?>
		</div>

		<div class="our-sectors__cta-wrap">
			<a href="<?php echo esc_url( home_url( '/sectors' ) ); ?>" class="btn-primary our-sectors__cta">
				<span class="button-text">Explore all Sectors</span>
				<span class="button-icon">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="" width="16" height="16" aria-hidden="true">
				</span>
			</a>
		</div>
	</div>
</section>
