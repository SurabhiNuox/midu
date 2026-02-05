<?php
/**
 * Template Name: Sectors
 * Sectors page — banner only.
 *
 * @package midu
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/sectors_banner.jpg');
	get_template_part('template-parts/inner-banner');
	?>
</main>

<?php
get_footer();
