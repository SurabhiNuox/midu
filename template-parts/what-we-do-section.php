<?php
/**
 * Template part: What We Do — heading, intro, row of service cards, outro.
 *
 * Data: set_query_var( 'wwd_title', 'wwd_intro', 'wwd_items', 'wwd_outro' )
 * wwd_items = array of array( 'icon' => url or filename, 'title' => string )
 *
 * @package midu
 */

$title = get_query_var( 'wwd_title' ) ?: 'What We Do';
$intro = get_query_var( 'wwd_intro' ) ?: '';
$items = get_query_var( 'wwd_items' );
$outro = get_query_var( 'wwd_outro' ) ?: '';

if ( ! is_array( $items ) ) {
	$items = array();
}

$theme_img = get_template_directory_uri() . '/assets/images/';
?>

<section class="what-we-do-section" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="container">
		<div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
		<?php if ( $title ) : ?>
			<h2 class="what-we-do-section__title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $intro ) : ?>
			<p class="what-we-do-section__intro"><?php echo esc_html( $intro ); ?></p>
		<?php endif; ?>
		</div>
		<?php if ( ! empty( $items ) ) : ?>
			<div class="what-we-do-section__grid">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$icon = isset( $item['icon'] ) ? $item['icon'] : '';
					if ( $icon !== '' && strpos( $icon, '://' ) === false ) {
						$icon = $theme_img . ltrim( $icon, '/' );
					}
					set_query_var( 'wwd_card_icon', $icon );
					set_query_var( 'wwd_card_title', isset( $item['title'] ) ? $item['title'] : '' );
					set_query_var( 'wwd_card_delay', $index * 100 );
					get_template_part( 'template-parts/what-we-do-card' );
					?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
		<?php if ( $outro ) : ?>
			<p class="what-we-do-section__outro"><?php echo esc_html( $outro ); ?></p>
		<?php endif; ?>
		</div>
	</div>
</section>
