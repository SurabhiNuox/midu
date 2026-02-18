<?php
/**
 * Template Name: Sector Detail
 * Sector detail page — inner banner only.
 *
 * @package midu
 */

get_header();
$image_text_list_third = array();
set_query_var( 'image_text_list_third', $image_text_list_third );
?>

<div class="sector_detail_page">
	<?php
	set_query_var( 'banner_title', "Mining" );
	set_query_var( 'banner_bg_image', get_template_directory_uri() . '/assets/images/mining_banner.jpg' );
	get_template_part( 'template-parts/inner-banner' );
	?>
	 <div class="main_content">
		<div class="container">
			<div class="breadcrumb breadcrumb-white">
				<ul>
					<li><a href="<?php echo home_url(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home.svg" alt="Home"></a></li>
					<li><a href="<?php echo home_url(); ?>">Sectors</a></li>
					<li><span>Mining</span></li>
				</ul>
			</div>
		</div>
		<?php
			set_query_var('overview_title', 'Driving growth and delivering value through innovative development and strategic execution.');
			set_query_var('overview_image', get_template_directory_uri() . '/assets/images/sector_overview.jpg');
			set_query_var('overview_graphic', get_template_directory_uri() . '/assets/images/mining_frame.png');
			set_query_var('overview_content', array(
				'MIDU plays a pivotal role in shaping the future of Saudi Arabia’s {Sector Name} landscape by combining deep expertise, long-term vision, and a commitment to quality. Our work in this sector is guided by innovation, sustainability, and alignment with national development goals.',
			));
			get_template_part('template-parts/overview-section');
			?>
		<div class="sector_detail_overview">
				<?php
				set_query_var( 'image_text_block_wrapper_class', '' );
				set_query_var( 'image_text_title', 'Mining Overview' );
					set_query_var( 'image_text_paragraphs', array(
						'MIDU’s involvement in the {Sector Name} sector is driven by a clear focus: delivering projects that are impactful, future-ready, and commercially viable. We leverage strategic insight, strong partnerships, and industry-leading standards to ensure each project contributes to economic growth and elevates the sector’s overall potential.',
						'Our approach integrates market intelligence, operational excellence, and stakeholder value to create developments that stand the test of time.',
					) );
				set_query_var( 'image_text_list', get_query_var( 'image_text_list_third' ) );
				set_query_var( 'image_text_list_paragraph', array() );
				set_query_var( 'image_text_acf_list_field', 'image_text_list' );
				set_query_var( 'image_text_acf_list_paragraph_field', 'image_text_list_paragraph' );
				set_query_var( 'image_text_image', 'mining_pic.jpg' );
				set_query_var( 'image_text_section_class', 'light_blue' );
				get_template_part( 'template-parts/image-text-block' );
				?>
			<div class="bg_img">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/light-blue-vector.svg' ); ?>" alt="image"?>
			</div>
		</div>
		<?php
		set_query_var( 'sector_wwd_title', 'What We Do in This Sector' );
		set_query_var( 'sector_wwd_items', array(
			array(
				'icon'        => 'sector_icon_1.png',
				'title'       => 'Strategy & Planning',
				'description' => 'Developing strategic natural resource opportunities.',
			),
			array(
				'icon'        => 'sector_icon_2.png',
				'title'       => 'Project Development',
				'description' => 'Leading end-to-end development, from concept to delivery.',
			),
			array(
				'icon'        => 'sector_icon_3.png',
				'title'       => 'Partnership Enablement',
				'description' => 'Working with government, private sector, and investors to unlock new opportunities.',
			),
			array(
				'icon'        => 'sector_icon_4.png',
				'title'       => 'Innovation & Sustainability',
				'description' => 'Integrating modern solutions, technology, and environmental best practices.',
			),
			array(
				'icon'        => 'sector_icon_5.png',
				'title'       => 'Operational Excellence',
				'description' => 'Ensuring efficiency, quality, and accountability across every stage.',
			),
		) );
		get_template_part( 'template-parts/sector-what-we-do-section' );
		?>
		<?php
		// Project Management section — sector-specific content (no overlay)
		set_query_var( 'pm_show_overlay', false );
		set_query_var( 'pm_title', 'Key Focus Areas' );
		set_query_var( 'pm_intro', 'Lorem ipsum dolor consectetur adipiscing elit tortor' );
		set_query_var( 'pm_items', array(
			array( 'icon' => 'kf_icon_1.svg', 'title' => 'Market analysis and opportunity identification' ),
			array( 'icon' => 'kf_icon_2.svg', 'title' => 'Location strategy and master planning' ),
			array( 'icon' => 'kf_icon_3.svg', 'title' => 'Community and stakeholder integration' ),
			array( 'icon' => 'kf_icon_4.svg', 'title' => 'Design development and feasibility studies' ),
			array( 'icon' => 'kf_icon_5.svg', 'title' => 'Digital and smart infrastructure integration' ),
			array( 'icon' => 'kf_icon_6.svg', 'title' => 'Sustainability-driven solutions' ),
		) );
		set_query_var( 'pm_image', 'key_focus_img.jpg' );
		set_query_var( 'pm_image_alt', 'Sector Management' );
		get_template_part( 'template-parts/project-management' );
		?>
		<div class="impact_value_section__bg">
			<div class="impact_value_section__bg_img">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imapact_gradient-v2.png" alt="Impact & Value Background">
			</div>
			<?php
			set_query_var( 'image_text_block_wrapper_class', 'impact_value_section' );
			set_query_var( 'image_text_title', 'Impact & Value' );
			set_query_var( 'image_text_paragraphs', array(
				'Our work within the {Sector Name} sector creates measurable impact through:',
			) );
			set_query_var( 'image_text_list', array(
				'Strengthening economic diversification',
				'Enhancing quality of life and community engagement',
				'Driving innovation within the sector',
				'Attracting investment and long-term partnerships',
				'Supporting Vision 2030 goals',
			) );

			set_query_var( 'image_text_list_paragraph', array() );
			set_query_var( 'image_text_acf_list_paragraph_field', 'image_text_list_paragraph_third' );
			set_query_var( 'image_text_acf_list_field', 'image_text_list_third' );
			set_query_var( 'image_text_image', 'value_img.jpg' );
			set_query_var( 'image_text_section_class', 'white_text dark_blue' );
			get_template_part( 'template-parts/image-text-block' );
			?>
		</div>
	<?php
		// Featured Projects — Swiper slider of project cards
		$theme_images = get_template_directory_uri() . '/assets/images/';
		set_query_var( 'featured_projects_title', 'Featured Projects' );
		set_query_var( 'featured_projects_subtitle', "A selection of MIDU's flagship developments across key sectors." );
		set_query_var( 'featured_projects_items', array(
			array(
				'image'       => $theme_images . 'pp_4.jpg',
				'title'       => 'Jeddah Central Development',
				'description' => "A landmark addition to Jeddah's revitalized Waterfront.",
				'link'        => '#',
			),
			array(
				'image'       => $theme_images . 'pp_3.jpg',
				'title'       => 'CEER Motors Water Treatment Plant',
				'description' => 'A critical utility solution supporting the CEER Motors factory.',
				'link'        => '#',
			),
			array(
				'image'       => $theme_images . 'pp_1.jpg',
				'title'       => 'Quba Mosque',
				'description' => "Enhancing visitor experience at one of Islam's most historically significant mosques.",
				'link'        => '#',
			),
			array(
				'image'       => $theme_images . 'pp_1.jpg',
				'title'       => 'Quba Mosque',
				'description' => "Enhancing visitor experience at one of Islam's most historically significant mosques.",
				'link'        => '#',
			),
		) );
		get_template_part( 'template-parts/featured-projects-section' );
		?>
		
	</div><!-- .main_content -->
	<div class="position_relative">
		<?php
			set_query_var( 'image_text_block_wrapper_class', 'why_chosse_section' );
			set_query_var( 'image_text_title', 'Why Choose MIDU <br> for This Sector' );
			set_query_var( 'image_text_paragraphs', array() );
			set_query_var( 'image_text_list_paragraph', array() );
			// Why Choose list — change the text below; no paragraphs for this section
			set_query_var( 'image_text_list', array(
				'Proven expertise in sector-specific development',
				'Strong alignment with national priorities',
				'Robust partnerships with leading industry players',
				'Comprehensive understanding of market trends',
				'Commitment to sustainability and long-term value creation',
			) );
			set_query_var( 'image_text_image', 'why_choose_pic.jpg' );
			set_query_var( 'image_text_section_class', ' reverse_direction light_blue' );
			get_template_part( 'template-parts/image-text-block' );
			?>
			<div class="right_frame_img">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/philosophy_farme.png' ); ?>" alt="image"?>
			</div>
	</div>

<?php
get_footer();
