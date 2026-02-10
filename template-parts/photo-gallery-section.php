<?php
/**
 * Template part: Photo Gallery — title + Swiper slider of images with prev/next arrows.
 *
 * Data: set_query_var( 'photo_gallery_title', 'photo_gallery_images' )
 * photo_gallery_images = array of image URLs or theme filenames (e.g. gal_1.jpg)
 *
 * @package midu
 */

$title  = get_query_var( 'photo_gallery_title' ) ?: 'Photo Gallery';
$images = get_query_var( 'photo_gallery_images' );

if ( ! is_array( $images ) || empty( $images ) ) {
	return;
}

$theme_img = get_template_directory_uri() . '/assets/images/';
foreach ( $images as &$img ) {
	if ( $img && strpos( $img, '://' ) === false ) {
		$img = $theme_img . ltrim( $img, '/' );
	}
}
unset( $img );
?>

<section class="photo-gallery-section" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2 class="photo-gallery-section__title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		</div>
		<div class="photo-gallery-section__slider-wrap">
			<div class="swiper photo-gallery-swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $images as $image ) : ?>
						<div class="swiper-slide">
							<div class="photo-gallery-section__slide-inner">
								<img src="<?php echo esc_url( $image ); ?>" alt="" loading="lazy">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="button" class="photo-gallery-section__nav photo-gallery-section__nav--prev" aria-label="<?php esc_attr_e( 'Previous', 'midu' ); ?>">
				 <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/left_arw.png' ); ?>" alt="Arrow Left">
			</button>
			<button type="button" class="photo-gallery-section__nav photo-gallery-section__nav--next" aria-label="<?php esc_attr_e( 'Next', 'midu' ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/right_arw.png' ); ?>" alt="Arrow Right">
			</button>
		</div>

</section>
