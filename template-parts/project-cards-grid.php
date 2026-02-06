<?php
/**
 * Template part: Project cards grid — section with title, project cards, and Load more.
 *
 * Data: set_query_var( 'project_cards_title', 'project_cards_subtitle', 'project_cards_items', 'project_cards_initial', 'project_cards_per_page' )
 * Each item: array( 'image' => url, 'title' => string, 'description' => string, 'link' => url, 'show_button' => bool )
 *
 * @package midu
 */

$section_title    = get_query_var( 'project_cards_title' ) ?: '';
$section_subtitle = get_query_var( 'project_cards_subtitle' ) ?: '';
$items            = get_query_var( 'project_cards_items' );
$initial          = (int) get_query_var( 'project_cards_initial' );
$per_page         = (int) get_query_var( 'project_cards_per_page' );

if ( ! is_array( $items ) || empty( $items ) ) {
	return;
}

if ( $initial <= 0 ) {
	$initial = 6;
}
if ( $per_page <= 0 ) {
	$per_page = 6;
}

$total    = count( $items );
$show_btn = $total > $initial;
?>

<section class="project-cards-section" aria-label="Our Projects" data-initial="<?php echo (int) $initial; ?>" data-per-page="<?php echo (int) $per_page; ?>">
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
			<?php foreach ( $items as $i => $item ) : ?>
				<?php
				$is_hidden = $i >= $initial;
				set_query_var( 'project_card_image', isset( $item['image'] ) ? $item['image'] : '' );
				set_query_var( 'project_card_title', isset( $item['title'] ) ? $item['title'] : '' );
				set_query_var( 'project_card_description', isset( $item['description'] ) ? $item['description'] : '' );
				set_query_var( 'project_card_link', isset( $item['link'] ) ? $item['link'] : '#' );
				set_query_var( 'project_card_show_button', ! empty( $item['show_button'] ) );
				?>
				<div class="project-card-wrap<?php echo $is_hidden ? ' project-card--hidden' : ''; ?>">
					<?php get_template_part( 'template-parts/project-card' ); ?>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $show_btn ) : ?>
			<div class="project-cards-section__actions">
				<button type="button" class="project-cards-load-more" aria-label="Load more projects">Load more
					<span class="button-icon">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow.svg'); ?>" alt="Arrow Right">
					</span>
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>
