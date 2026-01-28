<?php
/**
 * Template part for displaying the main banner
 *
 * @package midu
 */

// Get banner data (can be customized via ACF or theme options later)
// For now using defaults - can be easily changed via ACF fields
// Check if ACF function exists, otherwise use defaults
$banner_title = (function_exists('get_field') && get_field('banner_title')) ? get_field('banner_title') : 'Shaping Sustainable Developments for Saudi Arabia';
$banner_description = (function_exists('get_field') && get_field('banner_description')) ? get_field('banner_description') : 'Driving transformative projects that support the Kingdom\'s urban, economic, and social future.';
$banner_button_text = (function_exists('get_field') && get_field('banner_button_text')) ? get_field('banner_button_text') : 'Discover MIDU';
$banner_button_link = (function_exists('get_field') && get_field('banner_button_link')) ? get_field('banner_button_link') : '#';
$banner_type = (function_exists('get_field') && get_field('banner_type')) ? get_field('banner_type') : 'video'; // 'image' or 'video' - default to video

$banner_image = '';
if (function_exists('get_field')) {
	$banner_image = get_field('banner_image');
}
if (!$banner_image) {
	$banner_image = get_template_directory_uri() . '/assets/images/banner_img_thumb.jpg'; // Using thumb as fallback
}

$banner_video = '';
if (function_exists('get_field')) {
	$banner_video = get_field('banner_video');
}
if (!$banner_video) {
	$banner_video = get_template_directory_uri() . '/assets/videos/banner_video.mp4';
}

$banner_video_thumb = '';
if (function_exists('get_field')) {
	$banner_video_thumb = get_field('banner_video_thumb');
}
if (!$banner_video_thumb) {
	$banner_video_thumb = get_template_directory_uri() . '/assets/images/banner_img_thumb.jpg';
}
?>

<section class="main-banner">
	<div class="swiper main-banner-swiper">
		<div class="swiper-wrapper">
			<!-- Single Slide -->
			<div class="swiper-slide">
				<div class="banner-slide">
					<?php if ($banner_type === 'video'): ?>
						<!-- Video Background -->
						<div class="banner-media video-background">
							<video 
								class="banner-video" 
								autoplay 
								muted 
								loop 
								playsinline
								poster="<?php echo esc_url($banner_video_thumb); ?>"
							>
								<source src="<?php echo esc_url($banner_video); ?>" type="video/mp4">
								<!-- Fallback image if video doesn't load -->
								<img src="<?php echo esc_url($banner_video_thumb); ?>" alt="<?php echo esc_attr($banner_title); ?>">
							</video>
							<div class="video-overlay"></div>
						</div>
					<?php else: ?>
						<!-- Image Background -->
						<div class="banner-media image-background">
							<img src="<?php echo esc_url($banner_image); ?>" alt="<?php echo esc_attr($banner_title); ?>" class="banner-image">
							<div class="image-overlay"></div>
						</div>
					<?php endif; ?>

					<!-- Content Overlay -->
					<div class="container">
						<div class="banner-content">
							<?php if ($banner_title): ?>
								<h1 class="banner-title"><?php echo esc_html($banner_title); ?></h1>
							<?php endif; ?>

							<?php if ($banner_description): ?>
								<p><?php echo esc_html($banner_description); ?></p>
							<?php endif; ?>

							<?php if ($banner_button_text && $banner_button_link): ?>
								<a href="<?php echo esc_url($banner_button_link); ?>" class="btn-primary">
									<span class="button-text"><?php echo esc_html($banner_button_text); ?></span>
									<span class="button-icon">
										<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow.svg'); ?>" alt="Arrow Right">
									</span>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
