<?php
/**
 * Template Name: Sector Detail
 * Sector detail page — inner banner only.
 *
 * @package midu
 */

get_header();
?>

<div class="sector_detail_page">
	<?php
	set_query_var( 'banner_title', get_the_title() );
	set_query_var( 'banner_bg_image', get_template_directory_uri() . '/assets/images/mining_banner.jpg' );
	get_template_part( 'template-parts/inner-banner' );
	?>
</div>

<?php
get_footer();
