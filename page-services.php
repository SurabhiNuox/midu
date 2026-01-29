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

		  <?php
		  // Light-blue-list: all content from page (title, intro, optional subtitle, list with icons)
		  set_query_var('light_blue_list_title', 'Strategic Development');
		  set_query_var('light_blue_list_intro', 'We help transform opportunities into viable, high-impact development strategies.');
		  set_query_var('light_blue_list_subtitle', 'Our strategic development services include');
		  set_query_var('light_blue_list_center', true);
		  set_query_var('light_blue_list_items', array(
			  array( 'icon' => 'ser-icon1.svg', 'title' => 'Site and land potential <br/> analysis' ),
			  array( 'icon' => 'ser-icon2.svg', 'title' => 'Financial feasibility and market<br/> studies' ),
			  array( 'icon' => 'ser-icon3.svg', 'title' => 'Visioning and <br/> development positioning' ),
			  array( 'icon' => 'ser-icon4.svg', 'title' => 'Concept formation and <br/> early planning' ),
			  array( 'icon' => 'ser-icon5.svg', 'title' => 'Long-term development <br/> roadmaps' ),
			  array( 'icon' => 'ser-icon6.svg', 'title' => 'Stakeholder alignment and <br/> strategy workshops' ),
		  ));
		  get_template_part('template-parts/light-blue-list');
		  ?>

<?php
		  // Investment & Development: left (title + intro), right (heading + capability list)
		  set_query_var('invest_title_line1', 'Investment <br/> Development');
		  set_query_var('invest_intro', 'We lead investments through a structured, disciplined approach that maximizes returns and minimizes risks.');
		  set_query_var('invest_right_heading', 'Our capabilities include');
		  set_query_var('invest_items', array(
			  array( 'icon' => 'cap-icon1.svg', 'title' => 'Investment planning and structuring' ),
			  array( 'icon' => 'cap-icon2.svg', 'title' => 'Asset and portfolio development' ),
			  array( 'icon' => 'cap-icon3.svg', 'title' => 'Investor relations and partnership facilitation' ),
			  array( 'icon' => 'cap-icon4.svg', 'title' => 'Risk assessment and mitigation strategies' ),
			  array( 'icon' => '', 'title' => 'Business models and financial frameworks' ),
		  ));
		  get_template_part('template-parts/invest-development');
		  ?>

<?php
		  get_template_part('template-parts/project-management');
		  ?>
	   </div>
</main><!-- #main -->

<?php
get_footer();