<?php
/**
 * Template part: Sectors grid — displays 6 sector cards in a grid layout.
 *
 * Data source: set_query_var( 'sectors_items' ) — array of sector data
 * Each item: array( 'image' => url, 'title' => string, 'description' => string, 'link' => url )
 *
 * @package midu
 */

$sectors_items = get_query_var('sectors_items');

if ( ! $sectors_items || ! is_array( $sectors_items ) || empty( $sectors_items ) ) {
	// Default sectors data
	$sectors_items = array(
		array(
			'image' => get_template_directory_uri() . '/assets/images/sector_1.jpg',
			'title' => 'Mining',
			'description' => 'Developing strategic natural resource opportunities.',
			'link' => '#',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/sector_2.jpg',
			'title' => 'Industrial',
			'description' => 'Enhancing manufacturing and logistics ecosystems.',
			'link' => '#',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/sector_3.jpg',
			'title' => 'Contracting',
			'description' => 'Delivering critical infrastructure and construction solutions.',
			'link' => '#',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/sector_4.jpg',
			'title' => 'Water Solutions',
			'description' => 'Supporting sustainable water management systems.',
			'link' => '#',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/sector_5.jpg',
			'title' => 'Real Estate Development',
			'description' => 'Creating vibrant, future-ready communities.',
			'link' => '#',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/sector_6.jpg',
			'title' => 'Utilities & Energy',
			'description' => 'Enabling essential services for long-term growth.',
			'link' => '#',
		),
	);
}
?>

<section class="sectors-grid" aria-label="Our Sectors">
	<div class="sectors-grid__inner-wrap">
		<div class="container">
			<div class="sectors-grid__inner">
				<?php foreach ( $sectors_items as $sector ) : ?>
					<?php
					set_query_var('sector_card_image', $sector['image'] ?? '');
					set_query_var('sector_card_title', $sector['title'] ?? '');
					set_query_var('sector_card_description', $sector['description'] ?? '');
					set_query_var('sector_card_link', $sector['link'] ?? '#');
					get_template_part('template-parts/sector-card');
					?>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="sectors-grid__graphic">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sectore_list_graphic.png" alt="Sectors Grid Graphic">
		</div>

	</div>
</section>
