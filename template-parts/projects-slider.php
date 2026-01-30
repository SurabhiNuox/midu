<?php
/**
 * Template part: Projects Pinned Slider (CEER "Inspired by a nation" style)
 * Pinned scroll section; one full-screen slide at a time; image + text change together.
 *
 * @package midu
 */

$slides = array(
	array(
		'image' => get_template_directory_uri() . '/assets/images/pro_1.jpg',
		'title' => 'Jabal Sahabiyah',
		'description' => 'This project positions MIDU as a pioneer in developing one of Saudi Arabia’s most promising mineral regions.',
		'link' => home_url('/about'),
		'link_text' => 'Explore Project',
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/pro_2.jpg',
		'title' => 'Jeddah Central Development',
		'description' => 'Concept development in partnership discussions with Jeddah Central Development Company.',
		'link' => home_url('/projects'),
		'link_text' => 'Explore Project',
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/pro_3.jpg',
		'title' => 'CEER Motors Water Treatment Plant',
		'description' => 'A critical utility solution  supporting the CEER Motors factory.',
		'link' => home_url('/sectors'),
		'link_text' => 'Explore Project',
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/pro_4.jpg',
		'title' => 'Quba Mosque',
		'description' => 'Enhancing visitor experience at one of Islam’s most historically significant mosques',
		'link' => home_url('/sustainability'),
		'link_text' => 'Explore Project',
	),
);
?>


<section class="projects_section">
 <div class="container">
		<div class="project-header">
			<div class="project-header-content">
				<h2 class="second_title">Featured Projects</h2>
				<p>A selection of MIDU’s flagship developments across key sectors.</p>
			</div>
			<a href="#" class="btn-primary">
			<span class="button-text">View all Projects</span>
			<span class="button-icon">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow.svg'); ?>" alt="Arrow Right">
			</span>
		</a>
	</div>
</div>
<?php $slide_count = count( $slides ); ?>
<div class="projects-slider-section" id="projects-slider" aria-label="Our story" data-slides="<?php echo (int) $slide_count; ?>" style="--projects-slides: <?php echo (int) $slide_count; ?>; --projects-slide-vh: 50;">
	<div class="projects-slider-section__sticky">
		<div class="projects-slider__inner">
			<?php foreach ( $slides as $i => $slide ) : ?>
			<div class="projects-slider__slide<?php echo $i === 0 ? ' is-active' : ''; ?>" data-slide-index="<?php echo (int) $i; ?>">
				<div class="projects-slider__media">
					<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="" class="projects-slider__img" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>">
				</div>
				<div class="projects-slider__overlay" aria-hidden="true"></div>
			</div>
			<?php endforeach; ?>

			<div class="projects-slider__content-column" aria-label="Slide content">
				<div class="projects-slider__content-strip">
					<?php foreach ( $slides as $i => $slide ) : ?>
					<div class="projects-slider__content-block<?php echo $i === 0 ? ' is-active' : ''; ?>" data-content-index="<?php echo (int) $i; ?>">
						<h2 class="projects-slider__title"><?php echo esc_html( $slide['title'] ); ?></h2>
						<p><?php echo esc_html( $slide['description'] ); ?></p>
						<?php if ( ! empty( $slide['link'] ) && ! empty( $slide['link_text'] ) ) : ?>
							<a href="<?php echo esc_url( $slide['link'] ); ?>" class="projects-slider__cta">
								<?php echo esc_html( $slide['link_text'] ); ?>
								<span>
									<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/shape_arw.svg'); ?>" alt="" class="projects-slider__cta-icon" width="16" height="16" aria-hidden="true">
								</span>
							</a>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="projects-slider-section__filler" aria-hidden="true"></div>
</div>
</section>