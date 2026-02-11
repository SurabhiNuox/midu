<?php
/**
 * Template part: Project detail banner — full-width hero with background image, headline and paragraph overlay.
 *
 * Data: set_query_var( 'project_banner_bg_image', 'project_banner_title', 'project_banner_description' )
 *
 * @package midu
 */

$bg_image    = get_query_var( 'project_banner_bg_image' ) ?: '';
$title       = get_query_var( 'project_banner_title' ) ?: '';
$description = get_query_var( 'project_banner_description' ) ?: '';

if ( $bg_image && strpos( $bg_image, '://' ) === false ) {
	$bg_image = get_template_directory_uri() . '/assets/images/' . ltrim( $bg_image, '/' );
}
if ( ! $bg_image ) {
	$bg_image = get_template_directory_uri() . '/assets/images/default-banner.jpg';
}
if ( ! $title ) {
	$title = get_the_title();
}
?>

<section class="project-detail-banner" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="project-detail-banner__media">
		<img src="<?php echo esc_url( $bg_image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="project-detail-banner__image">
		<div class="project-detail-banner__overlay"></div>
	</div>
	<div class="container">
		<div class="project-detail-banner__content">
			<?php if ( $title ) : ?>
				<h1 class="project-detail-banner__title" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"><?php echo esc_html( $title ); ?></h1>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<p class="project-detail-banner__description" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true"><?php echo wp_kses_post( $description ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
