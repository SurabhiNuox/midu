<?php
/**
 * Template part: Our Philosophy — two columns: text + list (left), image (right).
 *
 * Data: set_query_var( 'philosophy_title', 'philosophy_intro', 'philosophy_items', 'philosophy_outro', 'philosophy_image' )
 * philosophy_items = array of array( 'icon' => filename, 'text' => string )
 *
 * @package midu
 */

$title  = get_query_var( 'philosophy_title' ) ?: 'Our Philosophy';
$intro  = get_query_var( 'philosophy_intro' ) ?: '';
$items  = get_query_var( 'philosophy_items' );
$outro  = get_query_var( 'philosophy_outro' ) ?: '';
$image  = get_query_var( 'philosophy_image' ) ?: '';

if ( ! is_array( $items ) ) {
	$items = array();
}

$theme_img = get_template_directory_uri() . '/assets/images/';
?>

<section class="philosophy-section" aria-label="<?php echo esc_attr( $title ); ?>">
	<div class="container">
		<div class="philosophy-section__inner">
			<div class="philosophy-section__content">
				<div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
				<?php if ( $title ) : ?>
					<h2 class="philosophy-section__title"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $intro ) : ?>
					<p><?php echo esc_html( $intro ); ?></p>
				<?php endif; ?>
				</div>
				<?php if ( ! empty( $items ) ) : ?>
					<ul class="philosophy-section__list" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
						<?php foreach ( $items as $item ) : ?>
							<?php
							$icon = isset( $item['icon'] ) ? $item['icon'] : '';
							$text = isset( $item['text'] ) ? $item['text'] : '';
							if ( $icon !== '' && strpos( $icon, '://' ) === false ) {
								$icon = $theme_img . ltrim( $icon, '/' );
							}
							?>
							<li class="philosophy-section__item" >
								<?php if ( $icon ) : ?>
									<span class="philosophy-section__icon">
										<img src="<?php echo esc_url( $icon ); ?>" alt="" aria-hidden="true" loading="lazy">
									</span>
								<?php endif; ?>
								<?php if ( $text ) : ?>
									<span class="philosophy-section__item-text"><?php echo esc_html( $text ); ?></span>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
					<?php if ( $outro ) : ?>
						<p class="philosophy-section__outro"><?php echo esc_html( $outro ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( $image ) : ?>
				<div class="philosophy-section__image-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="philosophy-section__image" loading="lazy">
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="ph_bg_graphic">
			 <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ph_graphic.png' ); ?>" alt="image"?>
		</div>
</section>
