<?php
/**
 * Template part: Project cards grid — section with title and 6 project cards.
 *
 * Data: set_query_var( 'project_cards_title', 'project_cards_subtitle', 'project_cards_items' )
 * Each item: array( 'image' => url, 'title' => string, 'description' => string, 'link' => url, 'show_button' => bool )
 *
 * @package midu
 */

$section_title    = get_query_var( 'project_cards_title' ) ?: '';
$section_subtitle = get_query_var( 'project_cards_subtitle' ) ?: '';
$items            = get_query_var( 'project_cards_items' );

if ( ! is_array( $items ) || empty( $items ) ) {
	return;
}
?>

<section class="project-cards-section" aria-label="Our Projects">
	<div class="container">
		<?php if ( $section_title || $section_subtitle ) : ?>
			<div class="project-cards-section__header">
				<?php if ( $section_title ) : ?>
					<h2 class="project-cards-section__title"><?php echo esc_html( $section_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $section_subtitle ) : ?>
					<p class="project-cards-section__subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
				<?php endif; ?>
				</div>
		<?php endif; ?>

		<div class="project-cards-grid">
			<?php foreach ( $items as $item ) : ?>
				<?php
				set_query_var( 'project_card_image', isset( $item['image'] ) ? $item['image'] : '' );
				set_query_var( 'project_card_title', isset( $item['title'] ) ? $item['title'] : '' );
				set_query_var( 'project_card_description', isset( $item['description'] ) ? $item['description'] : '' );
				set_query_var( 'project_card_link', isset( $item['link'] ) ? $item['link'] : '#' );
				set_query_var( 'project_card_show_button', ! empty( $item['show_button'] ) );
				get_template_part( 'template-parts/project-card' );
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
