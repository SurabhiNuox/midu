<?php
/**
 * Template part for displaying the inner banner
 * Supports video or image: set banner_bg_video for video, otherwise banner_bg_image is used.
 *
 * @package midu
 */

$banner_title   = get_query_var('banner_title') ?: get_the_title();
$banner_bg_image = get_query_var('banner_bg_image') ?: get_template_directory_uri() . '/assets/images/default-banner.jpg';
$banner_bg_video = get_query_var('banner_bg_video') ?: '';
$use_video      = ! empty( $banner_bg_video );
?>

<section class="inner-banner">
	<div class="inner-banner-media">
		<?php if ( $use_video ) : ?>
			<video class="inner-banner-video" autoplay muted loop playsinline poster="<?php echo esc_url( $banner_bg_image ); ?>">
				<source src="<?php echo esc_url( $banner_bg_video ); ?>" type="video/mp4">
				<img src="<?php echo esc_url( $banner_bg_image ); ?>" alt="<?php echo esc_attr( $banner_title ); ?>" class="inner-banner-image">
			</video>
		<?php else : ?>
			<img src="<?php echo esc_url( $banner_bg_image ); ?>" alt="<?php echo esc_attr( $banner_title ); ?>" class="inner-banner-image">
		<?php endif; ?>
		<div class="inner-banner-overlay"></div>
	</div>
	<div class="container">
		<div class="inner-banner-content">
			<h1 class="inner-banner-title"><?php echo esc_html( $banner_title ); ?></h1>
		</div>
	</div>
</section>
