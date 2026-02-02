<?php
/**
 * Template part: Our Sustainability Commitment
 * Sticky scroll section; smooth crossfade image transition (like Alpago Design & Build bottom section).
 *
 * @package midu
 */

$slides = array(
	array(
		'bg_image'   => get_template_directory_uri() . '/assets/images/sus_big_1.jpg',
		'card_image' => get_template_directory_uri() . '/assets/images/sus_small_1.jpg',
		'title'      => 'Environmental.',
		'description' => 'Minimizing environmental impact through smart, efficient solutions.',
		'link'       => home_url( '/sustainability' ),
		'link_label' => 'Explore Environmental',
	),
	array(
		'bg_image'   => get_template_directory_uri() . '/assets/images/sus_big_2.jpg',
		'card_image' => get_template_directory_uri() . '/assets/images/sus_small_2.jpg',
		'title'      => 'Environmental.',
		'description' => 'Minimizing environmental impact through smart, efficient solutions.',
		'link'       => home_url( '/sustainability' ),
		'link_label' => 'Explore Social',
	),
	array(
		'bg_image'   => get_template_directory_uri() . '/assets/images/sus_big_3.jpg',
		'card_image' => get_template_directory_uri() . '/assets/images/sus_small_3.jpg',
		'title'      => 'Environmental.',
		'description' => 'Minimizing environmental impact through smart, efficient solutions.',
		'link'       => home_url( '/sustainability' ),
		'link_label' => 'Explore Governance',
	),
);

$slide_count = count( $slides );
?>

<section class="sustainability-commitment" aria-label="Our Sustainability Commitment">
	<div class="sustainability-commitment-section" id="sustainability-commitment-slider" data-slides="<?php echo (int) $slide_count; ?>" style="--sus-slides: <?php echo (int) $slide_count; ?>; --sus-slide-vh: 50;">
		<div class="sustainability-commitment-section__sticky">
			<div class="sustainability-commitment__view">
				<?php foreach ( $slides as $i => $slide ) : ?>
				<div class="sustainability-commitment__bg-slide<?php echo $i === 0 ? ' is-active' : ''; ?>" data-slide-index="<?php echo (int) $i; ?>" style="background-image: url('<?php echo esc_url( $slide['bg_image'] ); ?>');" role="img" aria-label="<?php echo esc_attr( $slide['title'] ); ?>"></div>
				<?php endforeach; ?>
				<div class="sustainability-commitment__overlay" aria-hidden="true"></div>
				<div class="container sustainability-commitment__inner">
					<div class="sustainability-commitment__left">
						<h2 class="second_title sustainability-commitment__title">Our Sustainability Commitment</h2>
						<p>Responsible development at the core of everything we build.</p>
						<a href="<?php echo esc_url( home_url( '/sustainability' ) ); ?>" class="btn-primary">
							<span class="button-text">Explore ESG Framework</span>
							<span class="button-icon">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="" width="16" height="16" aria-hidden="true">
							</span>
						</a>
					</div>
					<div class="sustainability-commitment__card">
						<?php foreach ( $slides as $i => $slide ) : ?>
						<div class="sustainability-commitment__card-block<?php echo $i === 0 ? ' is-active' : ''; ?>" data-card-index="<?php echo (int) $i; ?>">
							<h3 class="sustainability-commitment__card-title"><?php echo esc_html( $slide['title'] ); ?></h3>
							<p class="sustainability-commitment__card-desc"><?php echo esc_html( $slide['description'] ); ?></p>
							<a href="<?php echo esc_url( $slide['link'] ); ?>" class="sustainability-commitment__card-link" aria-label="<?php echo esc_attr( $slide['link_label'] ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arw_link.svg' ); ?>" alt="" width="32" height="32">
							</a>
							<div class="sustainability-commitment__card-image">
								<img src="<?php echo esc_url( $slide['card_image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>">
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="sustainability-commitment-section__filler" aria-hidden="true"></div>
	</div>
</section>
