<?php
/**
 * Template Name: Services
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	// Set banner variables
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/service-banner.jpg');
	get_template_part('template-parts/inner-banner');
	?>

	   <div class="main_content">
		  <div class="container"></div>
	   </div>
</main><!-- #main -->

<?php
get_footer();