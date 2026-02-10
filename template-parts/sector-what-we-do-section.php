<?php
/**
 * Template part: What We Do in This Sector — heading + grid of cards (icon, title, description).
 *
 * Data: set_query_var( 'sector_wwd_title', 'sector_wwd_items' )
 * sector_wwd_items = array of array( 'icon' => filename, 'title' => string, 'description' => string )
 *
 * @package midu
 */

$title = get_query_var( 'sector_wwd_title' ) ?: 'What We Do in This Sector';
$items = get_query_var( 'sector_wwd_items' );

if ( ! is_array( $items ) ) {
	$items = array();
}

$theme_img = get_template_directory_uri() . '/assets/images/';
?>

<section class="sector-what-we-do" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2 class="sector-what-we-do__title" data-aos="fade-up" data-aos-duration="600" data-aos-once="true"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( ! empty( $items ) ) : ?>
			<div class="sector-what-we-do__grid">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$icon = isset( $item['icon'] ) ? $item['icon'] : '';
					if ( $icon !== '' && strpos( $icon, '://' ) === false ) {
						$icon = $theme_img . ltrim( $icon, '/' );
					}
					set_query_var( 'sector_wwd_card_icon', $icon );
					set_query_var( 'sector_wwd_card_title', isset( $item['title'] ) ? $item['title'] : '' );
					set_query_var( 'sector_wwd_card_description', isset( $item['description'] ) ? $item['description'] : '' );
					set_query_var( 'sector_wwd_card_delay', $index * 100 );
					get_template_part( 'template-parts/sector-what-we-do-card' );
					?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
