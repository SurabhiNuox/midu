<?php
/**
 * Template Name: Sectors
 * Sectors page — banner only.
 *
 * @package midu
 */

get_header();
?>

<div class="sectors_page">
	<?php
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/sectors_banner.jpg');
	get_template_part('template-parts/inner-banner');
	?>
	<div class="main_content">
		  <?php
		  // Set overview section variables
		  set_query_var('overview_title', 'Sectors Overview');
		  set_query_var('overview_image', get_template_directory_uri() . '/assets/images/sectore_pic.jpg');
		  set_query_var('overview_graphic', get_template_directory_uri() . '/assets/images/sector_bg.svg');
		  set_query_var('overview_content', array(
			  'At MIDU, we operate across strategically selected sectors that play a vital role in driving sustainable growth and national development. Our multidisciplinary expertise allows us to identify high-value opportunities, deliver innovative solutions, and create long-term economic and social impact.',
			  'By combining strategic insight, strong partnerships, and a commitment to excellence, we ensure every project aligns with Saudi Arabia’s evolving landscape and Vision 2030 goals.',
		  ));
		  get_template_part('template-parts/overview-section');
		  ?>
		<?php get_template_part('template-parts/sectors-grid'); ?>
	</div>
</div>

<?php
get_footer();
