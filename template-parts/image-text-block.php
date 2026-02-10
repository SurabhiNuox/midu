<?php
/**
 * Template part: Image + text block with optional wrapper. Resolves ACF for list/list_paragraph.
 * Only outputs wrapper and section when there is content.
 *
 * Data: set_query_var( 'image_text_block_wrapper_class', 'image_text_title', 'image_text_paragraphs',
 *   'image_text_list', 'image_text_list_paragraph', 'image_text_image', 'image_text_section_class',
 *   'image_text_button_url', 'image_text_button_text', 'image_text_image_alt',
 *   'image_text_acf_list_field', 'image_text_acf_list_paragraph_field' )
 *
 * @package midu
 */

$wrapper_class = get_query_var( 'image_text_block_wrapper_class' ) ?: '';
$title         = get_query_var( 'image_text_title' ) ?: '';
$paragraphs    = get_query_var( 'image_text_paragraphs' );
$list          = get_query_var( 'image_text_list' );
$list_paragraph = get_query_var( 'image_text_list_paragraph' );
$image         = get_query_var( 'image_text_image' ) ?: '';
$section_class = get_query_var( 'image_text_section_class' ) ?: '';
$button_url    = get_query_var( 'image_text_button_url' ) ?: '#';
$button_text   = get_query_var( 'image_text_button_text' ) ?: '';
$image_alt     = get_query_var( 'image_text_image_alt' ) ?: '';
$acf_list_field = get_query_var( 'image_text_acf_list_field' ) ?: '';
$acf_list_paragraph_field = get_query_var( 'image_text_acf_list_paragraph_field' ) ?: '';

if ( ! is_array( $paragraphs ) ) {
	$paragraphs = array();
}
if ( ! is_array( $list ) ) {
	$list = array();
}
if ( ! is_array( $list_paragraph ) ) {
	$list_paragraph = array();
}

if ( $acf_list_paragraph_field && function_exists( 'get_field' ) && get_field( $acf_list_paragraph_field ) ) {
	$acf_paras = get_field( $acf_list_paragraph_field );
	if ( is_array( $acf_paras ) ) {
		$list_paragraph = array();
		foreach ( $acf_paras as $row ) {
			$list_paragraph[] = is_array( $row ) ? ( isset( $row['paragraph'] ) ? $row['paragraph'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
		}
	}
}
if ( $acf_list_field && function_exists( 'get_field' ) && get_field( $acf_list_field ) ) {
	$acf_list = get_field( $acf_list_field );
	if ( is_array( $acf_list ) ) {
		$list = array();
		foreach ( $acf_list as $row ) {
			$list[] = is_array( $row ) ? ( isset( $row['item'] ) ? $row['item'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
		}
	}
}

$has_content = $title || ! empty( $paragraphs ) || ! empty( $list ) || $button_text || $image;
if ( ! $has_content ) {
	return;
}

set_query_var( 'image_text_title', $title );
set_query_var( 'image_text_paragraphs', $paragraphs );
set_query_var( 'image_text_list', $list );
set_query_var( 'image_text_list_paragraph', $list_paragraph );
set_query_var( 'image_text_image', $image );
set_query_var( 'image_text_section_class', $section_class );
set_query_var( 'image_text_button_url', $button_url );
set_query_var( 'image_text_button_text', $button_text );
set_query_var( 'image_text_image_alt', $image_alt );
?>

<?php if ( $wrapper_class ) : ?>
<div class="<?php echo esc_attr( $wrapper_class ); ?>">
<?php endif; ?>
	<div class="container">
		<?php get_template_part( 'template-parts/image-text' ); ?>
	</div>
<?php if ( $wrapper_class ) : ?>
</div>
<?php endif; ?>
