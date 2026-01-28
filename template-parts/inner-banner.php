<?php
/**
 * Template part for displaying the inner banner
 *
 * @package midu
 */

// Get banner title from query var or use page title
$banner_title = get_query_var('banner_title') ?: get_the_title();
$banner_bg_image = get_query_var('banner_bg_image') ?: get_template_directory_uri() . '/assets/images/default-banner.jpg';

?>

<section class="inner-banner">
	<div class="inner-banner-media">
		<img src="<?php echo esc_url($banner_bg_image); ?>" alt="<?php echo esc_attr($banner_title); ?>" class="inner-banner-image">
		<div class="inner-banner-overlay"></div>
	</div>
	<div class="container">
		<div class="inner-banner-content">
			<h1 class="inner-banner-title"><?php echo esc_html($banner_title); ?></h1>
		</div>
	</div>
</section>
