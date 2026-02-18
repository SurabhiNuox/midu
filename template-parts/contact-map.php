<?php
/**
 * Template part: Contact map — dark-themed map with location pin (e.g. Riyadh).
 * Optional: commitment_map_lat, commitment_map_lng, commitment_map_zoom, commitment_map_address.
 *
 * @package midu
 */

$map_lat    = get_query_var( 'contact_map_lat' ) ?: 24.7136;
$map_lng    = get_query_var( 'contact_map_lng' ) ?: 46.6753;
$map_zoom   = get_query_var( 'contact_map_zoom' ) ?: 10;
$map_label  = get_query_var( 'contact_map_label' ) ?: 'Riyadh';
$map_color  = get_query_var( 'contact_map_color' ) ?: '#202031';
$marker_url = get_template_directory_uri() . '/assets/images/marker.svg';
?>

<section class="contact-map" aria-label="<?php esc_attr_e( 'Location map', 'midu' ); ?>">
	<div class="contact-map__container">
		<div id="contact-map-canvas" class="contact-map__canvas" data-lat="<?php echo esc_attr( $map_lat ); ?>" data-lng="<?php echo esc_attr( $map_lng ); ?>" data-zoom="<?php echo esc_attr( $map_zoom ); ?>" data-label="<?php echo esc_attr( $map_label ); ?>" data-map-color="<?php echo esc_attr( $map_color ); ?>" data-marker-url="<?php echo esc_url( $marker_url ); ?>"></div>
	</div>
</section>
