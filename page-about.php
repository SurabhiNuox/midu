<?php
/**
 * Template Name: About
 * About page — inner banner only.
 * Use page slug: about-midu (set in WP Admin → Edit Page → Permalink).
 *
 * @package midu
 */

get_header();
?>

<div class="about_page">
	<?php
	// Optional: set custom banner title (leave empty to use page title or slug)
	set_query_var( 'banner_title', 'About Us' );
	set_query_var( 'banner_bg_image', get_template_directory_uri() . '/assets/images/about_banner.jpg' );
	get_template_part( 'template-parts/inner-banner' );
	?>
	<div class="main_content">
		<?php
			set_query_var('overview_title', 'Crafting Spaces That Inspire. Building Experiences That Last.');
			set_query_var('overview_image', get_template_directory_uri() . '/assets/images/about_pic.jpg');
			set_query_var('overview_graphic', get_template_directory_uri() . '/assets/images/blue-bg-left-service.svg');
			set_query_var('overview_content', array(
				'MIDU is a forward-thinking interior design and build company dedicated to transforming everyday environments into meaningful, functional, and aesthetically elevated spaces. With a commitment to innovation, craftsmanship, and client-centered design, MIDU delivers turnkey interior solutions that merge creativity with technical excellence.',
				'Founded on the belief that great spaces shape better living and working experiences, MIDU blends contemporary design thinking with meticulous execution. Every project—residential, commercial, hospitality, or retail—is approached with a deep understanding of the client’s vision, lifestyle, and long-term needs.',
			));
			get_template_part('template-parts/overview-section');
			?>

		<?php
		// Mission & Vision cards (reusable card template)
		$theme_img = get_template_directory_uri() . '/assets/images/';
		set_query_var( 'mission_vision_items', array(
			array(
				'image'   => $theme_img . 'our_vision.jpg',
				'title'   => 'Our Mission',
				'content' => "To deliver high-impact, sustainable developments that enhance the Kingdom's economic and social landscape. Through strategic investment, innovative planning, and trusted partnerships, we transform opportunities into enduring value—building projects that empower communities and support Saudi Arabia's long-term vision.",
			),
			array(
				'image'   => $theme_img . 'our_mission.jpg',
				'title'   => 'Our Vision',
				'content' => "To be a leading Saudi-born development company recognized for shaping transformative projects that drive national progress, inspire innovation, and set new standards of excellence across multiple sectors.",
			),
		) );
		get_template_part( 'template-parts/mission-vision-section' );
		?>

		<?php
		// Our Philosophy — text + list (icons) left, image right
		$theme_img = get_template_directory_uri() . '/assets/images/';
		set_query_var( 'philosophy_title', 'Our Philosophy' );
		set_query_var( 'philosophy_intro', "At MIDU, design is more than what meets the eye—it's a purposeful process. We aim to create spaces that not only look beautiful but also feel intuitive, enhance usability, and improve overall wellbeing. Our philosophy is grounded in:" );
		set_query_var( 'philosophy_items', array(
			array( 'icon' => 'ph_icon_1.png', 'text' => 'Human-centered design' ),
			array( 'icon' => 'ph_icon_2.png', 'text' => 'Sustainable material choices' ),
			array( 'icon' => 'ph_icon_3.png', 'text' => 'Precision-led engineering' ),
			array( 'icon' => 'ph_icon_4.png', 'text' => 'Adaptive, future-ready solutions' ),
		) );
		set_query_var( 'philosophy_outro', 'Each environment we create carries our signature blend of simplicity, sophistication, and functionality.' );
		set_query_var( 'philosophy_image', $theme_img . 'philosopy_pic.jpg' );
		get_template_part( 'template-parts/philosophy-section' );
		?>

		<?php
		// What We Do — 5 service cards (reusable card template)
		$theme_img = get_template_directory_uri() . '/assets/images/';
		set_query_var( 'wwd_title', 'What We Do' );
		set_query_var( 'wwd_intro', 'MIDU provides end-to-end interior design and build services, ensuring seamless coordination from concept to completion. Our services include:' );
		set_query_var( 'wwd_items', array(
			array( 'icon' => 'we_1.png', 'title' => 'Interior Design & Concept Development' ),
			array( 'icon' => 'we_2.png', 'title' => 'Technical Drawings & Space Planning' ),
			array( 'icon' => 'we_3.png', 'title' => 'Fit-Out Execution & Project Management' ),
			array( 'icon' => 'we_4.png', 'title' => 'Joinery, Furniture & Custom Fabrication' ),
			array( 'icon' => 'we_5.png', 'title' => 'Material Sourcing & On-Site Supervision' ),
		) );
		set_query_var( 'wwd_outro', 'By combining design, engineering, and execution under one roof, we ensure efficiency, quality, and complete project transparency.' );
		get_template_part( 'template-parts/what-we-do-section' );
		?>

		<?php
		// Our Commitment — teal diagonal section with commitment_pic.jpg
		set_query_var( 'commitment_title', 'Our Commitment' );
		set_query_var( 'commitment_content', array(
			'MIDU stands for integrity, quality, and innovation. Every project is an opportunity to create lasting value—spaces that age gracefully, perform efficiently, and elevate everyday experiences..',
		) );
		set_query_var( 'commitment_image', get_template_directory_uri() . '/assets/images/abt_commitment.jpg' );
		get_template_part( 'template-parts/commitment-section' );
		?>
	</div>
</div>

<?php	
get_footer();
