<?php
/**
 * Template part: Key Details — dark section with title, subtitle, and row of detail cards (icon, label, value).
 *
 * Data: set_query_var( 'key_details_title', 'key_details_subtitle', 'key_details_items' )
 * key_details_items = array of array( 'icon' => filename or url, 'label' => string, 'value' => string )
 *
 * @package midu
 */

$title    = get_query_var( 'key_details_title' ) ?: 'Key Details';
$subtitle = get_query_var( 'key_details_subtitle' ) ?: '';
$items    = get_query_var( 'key_details_items' );

if ( ! is_array( $items ) || empty( $items ) ) {
	return;
}

$theme_img = get_template_directory_uri() . '/assets/images/';
foreach ( $items as &$item ) {
	if ( ! empty( $item['icon'] ) && strpos( $item['icon'], '://' ) === false ) {
		$item['icon'] = $theme_img . ltrim( $item['icon'], '/' );
	}
}
unset( $item );
?>

<section class="key-details-section" aria-label="<?php echo esc_attr( $title ); ?>">
<div class="bg-layer">
</div>
	<div class="container">
		<?php if ( $title || $subtitle ) : ?>
			<header class="key-details-section__header">
				<?php if ( $title ) : ?>
					<h2 class="key-details-section__title"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $subtitle ) : ?>
					<p><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>
			</header>
		<?php endif; ?>
		<div class="key-details-section__grid">
			<?php foreach ( $items as $item ) : ?>
				<div class="key-details-card">
					<div class="key-details-card__inner">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<div class="key-details-card__icon">
								<img src="<?php echo esc_url( $item['icon'] ); ?>" alt="" aria-hidden="true" loading="lazy">
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $item['label'] ) ) : ?>
							<div class="key-details-card__label"><?php echo esc_html( $item['label'] ); ?></div>
						<?php endif; ?>
						<?php if ( isset( $item['value'] ) && (string) $item['value'] !== '' ) : ?>
							<div class="key-details-card__value"><?php echo esc_html( $item['value'] ); ?></div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
