<?php
/**
 * Template part: Mission/Vision section — light blue background, two cards (Mission & Vision).
 *
 * Data: set_query_var( 'mission_vision_items' ) — array of items.
 * Each item: array( 'image' => url, 'title' => string, 'content' => string )
 *
 * @package midu
 */

$items = get_query_var( 'mission_vision_items' );

if ( ! is_array( $items ) || empty( $items ) ) {
	return;
}
?>

<section class="mission-vision-section">
	<div class="container">
		<div class="mission-vision-section__grid">
			<?php foreach ( $items as $item ) : ?>
				<?php
				set_query_var( 'mv_card_image', isset( $item['image'] ) ? $item['image'] : '' );
				set_query_var( 'mv_card_title', isset( $item['title'] ) ? $item['title'] : '' );
				set_query_var( 'mv_card_content', isset( $item['content'] ) ? $item['content'] : '' );
				get_template_part( 'template-parts/mission-vision-card' );
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
