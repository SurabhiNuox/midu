<?php
/**
 * Template Name: Projects
 * Projects page — banner only.
 *
 * @package midu
 */

get_header();
?>

<div class="projects_page">
	<?php
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/project_banner.jpg');
	set_query_var('banner_bg_video', get_template_directory_uri() . '/assets/videos/project_banner.mp4');
	get_template_part('template-parts/inner-banner');
	?>
	   <div class="main_content">
		<?php
			set_query_var('overview_title', 'Services Overview');
			set_query_var('overview_image', get_template_directory_uri() . '/assets/images/project_overview.jpg');
			set_query_var('overview_graphic', get_template_directory_uri() . '/assets/images/blue-bg-left-service.svg');
			set_query_var('overview_content', array(
				'At MIDU, our projects reflect our commitment to excellence, innovation, and long-term value creation. Each development is shaped by deep market understanding, strategic planning, and a focus on delivering outcomes that support national growth and community wellbeing.',
				'From large-scale real estate developments to specialized sector projects, our portfolio demonstrates our ability to transform vision into reality—responsibly, efficiently, and with uncompromising quality.',
			));
			get_template_part('template-parts/overview-section');
			?>
	   </div>
</div>

<?php
get_footer();
