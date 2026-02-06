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
			 <?php
		  // Light-blue-list: all content from page (title, intro, optional subtitle, list with icons)
		  set_query_var('light_blue_list_title', 'Our Project Philosophy');
		  set_query_var('light_blue_list_intro', 'Every MIDU project is guided by a clear and consistent philosophy:');
		  set_query_var('light_blue_list_center', false);
		  set_query_var('light_blue_list_bg_image', get_template_directory_uri() . '/assets/images/philosophy_farme.png');
		  set_query_var('light_blue_list_items', array(
			  array( 'icon' => 'ph_icon_1.svg', 'title' => 'Strategic Purpose', 'description' => 'Projects are selected and developed based on clear market demand and high-value potential.' ),
			  array( 'icon' => 'ph_icon_2.svg', 'title' => 'Quality Execution', 'description' => 'We follow meticulous standards across planning, engineering, and delivery.' ),
			  array( 'icon' => 'ph_icon_3.svg', 'title' => 'Sustainable Design', 'description' => 'Each project incorporates environmentally responsible principles and long-term viability.' ),
			  array( 'icon' => 'ph_icon_4.svg', 'title' => 'nnovation & Technology', 'description' => 'Leveraging modern tools, smart systems, and future-ready approaches.' ),
			  array( 'icon' => 'ph_icon_5.svg', 'title' => 'Community Impact', 'description' => 'Creating developments that enhance quality of life and contribute to Vision 2030 goals.' ),
		  ));
		  get_template_part('template-parts/light-blue-list');
		  ?>

		<?php
		// Project cards grid — 6 cards (pp_1.jpg–pp_6.jpg), card template
		$theme_images = get_template_directory_uri() . '/assets/images/';
		set_query_var( 'project_cards_title', 'Our Project Philosophy' );
		set_query_var( 'project_cards_subtitle', 'Every MIDU project is guided by a clear and consistent philosophy' );
		set_query_var( 'project_cards_items', array(
			array(
				'image'       => $theme_images . 'pp_1.jpg',
				'title'       => 'Jeddah Central Development',
				'description' => "A landmark addition to Jeddah's revitalized waterfront",
				'link'        => '#',
				'show_button' => true,
			),
			array(
				'image'       => $theme_images . 'pp_2.jpg',
				'title'       => 'Quba Mosque',
				'description' => "Enhancing visitor experience at one of Islam's most historically significant mosques",
				'link'        => '#',
				'show_button' => true,
			),
			array(
				'image'       => $theme_images . 'pp_3.jpg',
				'title'       => 'City Park Green Riyadh',
				'description' => '',
				'link'        => '#',
				'show_button' => false,
			),
			array(
				'image'       => $theme_images . 'pp_4.jpg',
				'title'       => 'CEER Motors Water Treatment Plant',
				'description' => '',
				'link'        => '#',
				'show_button' => false,
			),
			array(
				'image'       => $theme_images . 'pp_5.jpg',
				'title'       => 'Al Hada Resort',
				'description' => '',
				'link'        => '#',
				'show_button' => false,
			),
			array(
				'image'       => $theme_images . 'pp_6.jpg',
				'title'       => 'Al Ghamamah Cultural Center',
				'description' => '',
				'link'        => '#',
				'show_button' => false,
			),
		) );
		get_template_part( 'template-parts/project-cards-grid' );
		?>
	   </div>
</div>

<?php
get_footer();
