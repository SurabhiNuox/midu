<?php
/**
 * Template part for displaying the overview section
 *
 * @package midu
 */

// Get overview section variables from query var or use defaults
$overview_title = get_query_var('overview_title') ?: 'Overview';
$overview_image = get_query_var('overview_image') ?: get_template_directory_uri() . '/assets/images/service-banner.jpg';
$overview_content = get_query_var('overview_content');

// If overview_content is not an array, use default content
if (!is_array($overview_content) || empty($overview_content)) {
	$overview_content = array(
		'Default overview content paragraph one.',
		'Default overview content paragraph two.'
	);
}

?>

<section class="overview-section">
	<div class="container">
		<div class="overview-content">
			<div class="overview-image">
				<img src="<?php echo esc_url($overview_image); ?>" alt="<?php echo esc_attr($overview_title); ?>">
			</div>
			<div class="overview-text">
				<h2 class="second_title"><?php echo esc_html($overview_title); ?></h2>
				<?php foreach ($overview_content as $paragraph) : ?>
					<p class="overview-paragraph"><?php echo esc_html($paragraph); ?></p>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
