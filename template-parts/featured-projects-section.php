<?php
/**
 * Template part: Featured Projects — title, subtitle, Swiper slider of project cards.
 *
 * Data: set_query_var( 'featured_projects_title', 'featured_projects_subtitle', 'featured_projects_items' )
 * featured_projects_items = array of array( 'image' => url, 'title' => string, 'description' => string, 'link' => url )
 *
 * @package midu
 */

$title    = get_query_var( 'featured_projects_title' ) ?: 'Featured Projects';
$subtitle = get_query_var( 'featured_projects_subtitle' ) ?: "A selection of MIDU's flagship developments across key sectors.";
$items    = get_query_var( 'featured_projects_items' );

if ( ! is_array( $items ) || empty( $items ) ) {
	return;
}
?>

<section class="featured-projects-section" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="container">
		<header class="featured-projects-section__header" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
			<?php if ( $title ) : ?>
				<h2 class="featured-projects-section__title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $subtitle ) : ?>
				<p class="featured-projects-section__subtitle"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
		</header>

		<div class="featured-projects-section__slider-wrap">
			<div class="swiper featured-projects-swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $items as $item ) : ?>
						<div class="swiper-slide">
							<?php
							set_query_var( 'project_card_image', isset( $item['image'] ) ? $item['image'] : '' );
							set_query_var( 'project_card_title', isset( $item['title'] ) ? $item['title'] : '' );
							set_query_var( 'project_card_description', isset( $item['description'] ) ? $item['description'] : '' );
							set_query_var( 'project_card_link', isset( $item['link'] ) ? $item['link'] : '#' );
							set_query_var( 'project_card_show_button', true );
							get_template_part( 'template-parts/project-card' );
							?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="button" class="featured-projects-section__nav featured-projects-section__nav--prev" aria-label="<?php esc_attr_e( 'Previous projects', 'midu' ); ?>">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/left_arw.png'); ?>" alt="Arrow Left">
			</button>
			<button type="button" class="featured-projects-section__nav featured-projects-section__nav--next" aria-label="<?php esc_attr_e( 'Next projects', 'midu' ); ?>">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/right_arw.png'); ?>" alt="Arrow Right">
			</button>
		</div>
	</div>
</section>
