<?php
/**
 * Template part for image and text section
 * Content and image come from the page via query vars.
 *
 * @package midu
 */

$image_text_title       = get_query_var( 'image_text_title' );
$image_text_paragraphs  = get_query_var( 'image_text_paragraphs' );
$image_text_list            = get_query_var( 'image_text_list' );
$image_text_list_paragraph  = get_query_var( 'image_text_list_paragraph' );
$image_text_button_url      = get_query_var( 'image_text_button_url' );
$image_text_button_text = get_query_var( 'image_text_button_text' );
$image_text_image       = get_query_var( 'image_text_image' );
$image_text_image_alt   = get_query_var( 'image_text_image_alt' );
$image_text_section_class = get_query_var( 'image_text_section_class' );

if ( ! is_array( $image_text_paragraphs ) ) {
	$image_text_paragraphs = array();
}
if ( ! is_array( $image_text_list ) ) {
	$image_text_list = array();
}
if ( ! is_array( $image_text_list_paragraph ) ) {
	$image_text_list_paragraph = array();
}
$image_text_button_url  = $image_text_button_url ?: '#';
$image_text_button_text = $image_text_button_text ?: '';
$image_text_image_alt   = $image_text_image_alt ?: '';

// Resolve theme-relative image path
if ( $image_text_image && strpos( $image_text_image, '://' ) === false ) {
	$image_text_image = get_template_directory_uri() . '/assets/images/' . ltrim( $image_text_image, '/' );
}

$has_content = $image_text_title || ! empty( $image_text_paragraphs ) || ! empty( $image_text_list ) || $image_text_button_text || $image_text_image;
if ( ! $has_content ) {
	return;
}

$wrapper_class = 'right_text_image' . ( ! empty( $image_text_section_class ) ? ' ' . esc_attr( $image_text_section_class ) : '' );
?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
	<div class="right_text_main">
		<?php if ( $image_text_title ) : ?>
			<h2 class="second_title"><?php echo esc_html( $image_text_title ); ?></h2>
		<?php endif; ?>
		<?php foreach ( $image_text_paragraphs as $p ) : ?>
			<p><?php echo wp_kses_post( $p ); ?></p>
		<?php endforeach; ?>
		<?php if ( ! empty( $image_text_list ) ) : ?>
			<ul>
				<?php foreach ( $image_text_list as $index => $item ) : ?>
					<?php
					$para = isset( $image_text_list_paragraph[ $index ] ) ? $image_text_list_paragraph[ $index ] : '';
					$has_para = ( $para !== '' && $para !== null );
					$li_class = $has_para ? ' list_with_title' : '';
					?>
					<li class="<?php echo esc_attr( trim( $li_class ) ); ?>">
					<?php echo esc_html( $item ); ?>
						<?php if ( $has_para ) : ?>
							<p><?php echo esc_html( $para ); ?></p>
						<?php endif; ?>
						
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<?php if ( $image_text_button_text ) : ?>
			<a href="<?php echo esc_url( $image_text_button_url ); ?>" class="btn-primary">
				<span class="button-text"><?php echo esc_html( $image_text_button_text ); ?></span>
				<span class="button-icon">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="Arrow Right">
				</span>
			</a>
		<?php endif; ?>
	</div>
	<?php if ( $image_text_image ) : ?>
		<div class="right_text_img">
			<img src="<?php echo esc_url( $image_text_image ); ?>" alt="<?php echo esc_attr( $image_text_image_alt ); ?>">
		</div>
	<?php endif; ?>
</div>
