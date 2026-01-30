<?php
/**
 * Template part: Intro / Saudi Vision 2030 section
 * Animation: video in mask → mask zooms out and disappears → text from bottom → video full width
 *
 * @package midu
 */

$intro_video = get_template_directory_uri() . '/assets/videos/intro_video.mp4';
$video_mask  = get_template_directory_uri() . '/assets/images/video_mask.svg';
?>

<section class="intro-vision" id="intro-vision" aria-label="Saudi Vision 2030">
	<!-- Full-width video (visible after mask disappears) -->
	<div class="intro-vision__full-video" aria-hidden="true">
		<video class="intro-vision__video" autoplay muted playsinline loop>
			<source src="<?php echo esc_url( $intro_video ); ?>" type="video/mp4">
		</video>
		<div class="intro-vision__full-overlay" aria-hidden="true"></div>
	</div>

	<!-- Phase 1: Video inside mask -->
	<div class="intro-vision__mask-phase" id="intro-mask-phase">
		<div class="intro-vision__mask-wrap">
			<div class="intro-vision__mask-bg" style="mask-image: url('<?php echo esc_url( $video_mask ); ?>'); -webkit-mask-image: url('<?php echo esc_url( $video_mask ); ?>');">
				<video class="intro-vision__video intro-vision__video--masked" autoplay muted playsinline loop>
					<source src="<?php echo esc_url( $intro_video ); ?>" type="video/mp4">
				</video>
			</div>
		</div>
	</div>

	<!-- Text (appears from bottom after mask disappears) -->
	<div class="intro-vision__content" id="intro-vision-content">
		<div class="container">
			<p class="intro-vision__above">IN ALIGNMENT WITH</p>
			<h1 class="intro-vision__title">SAUDI VISION 2030</h1>
			<p class="intro-vision__tagline">Advancing national transformation through strategic development.</p>
		</div>
	</div>

	<!-- Dark background behind mask phase -->
	<div class="intro-vision__bg" aria-hidden="true"></div>
</section>
