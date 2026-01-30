<?php
/**
 * Template part for displaying the Explore Our World section
 *
 * @package midu
 */

// Get section data (can be customized via ACF or theme options later)
$section_title = (function_exists('get_field') && get_field('explore_title')) ? get_field('explore_title') : 'Explore Our World';
$section_description = (function_exists('get_field') && get_field('explore_description')) ? get_field('explore_description') : 'Driving transformative projects that support the Kingdom\'s urban, economic, and social future.';

// Card data
$cards = array(
	array(
		'title' => 'About MIDU',
		'description' => 'Insight into who we are and what drives our vision.',
		'image' => get_template_directory_uri() . '/assets/images/exp_1.jpg',
		'link' => home_url('/about')
	),
	array(
		'title' => 'Sectors',
		'description' => 'A diversified portfolio spanning key national industries.',
		'image' => get_template_directory_uri() . '/assets/images/exp_2.jpg',
		'link' => home_url('/sectors')
	),
	array(
		'title' => 'Projects',
		'description' => 'Strategic developments shaping communities and industries.',
		'image' => get_template_directory_uri() . '/assets/images/exp_3.jpg',
		'link' => home_url('/projects')
	),
	array(
		'title' => 'Sustainability',
		'description' => 'ESG-focused progress supporting Vision 2030 goals.',
		'image' => get_template_directory_uri() . '/assets/images/exp_4.jpg',
		'link' => home_url('/sustainability')
	)
);
?>



	<div class="container">
		<!-- Heading and Description -->
		<div class="explore-header">
			<?php if ($section_title): ?>
				<h2 class="second_title"><?php echo esc_html($section_title); ?></h2>
			<?php endif; ?>

			<?php if ($section_description): ?>
				<p><?php echo esc_html($section_description); ?></p>
			<?php endif; ?>
		</div>

		<!-- Content Cards Grid -->
		<div class="explore-cards-grid">
			<?php foreach ($cards as $card): ?>
				<div class="explore-card">
					<div class="card-content">
						<h3 class="card-title"><?php echo esc_html($card['title']); ?></h3>
						<p><?php echo esc_html($card['description']); ?></p>
					</div>
					
					<div class="card-image-wrapper">
						<img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>" class="card-image">
					</div>
					<a href="<?php echo esc_url($card['link']); ?>" class="card-cta-button" aria-label="Explore <?php echo esc_attr($card['title']); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Explore <?php echo esc_attr($card['title']); ?>">
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

