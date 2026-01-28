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
		  <?php
		  // Set overview section variables
		  set_query_var('overview_title', 'Services Overview');
		  set_query_var('overview_image', get_template_directory_uri() . '/assets/images/service-overview.jpg');
		  set_query_var('overview_content', array(
			  'At MIDU, we provide end-to-end development services that combine strategic vision, investment intelligence, and world-class execution.',
			  'Our multidisciplinary capabilities enable us to deliver impactful projects across multiple sectors—ensuring long-term value, operational efficiency, and sustainable growth.',
			  'Whether we are shaping new destinations, revitalizing land assets, or managing complex multi-phase developments, our approach is rooted in innovation, rigorous planning, and strong partnerships.'
		  ));
		  get_template_part('template-parts/overview-section');
		  ?>
	   </div>
</main><!-- #main -->

<?php
get_footer();