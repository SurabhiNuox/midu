<?php
/**
 * Template Name: Project Detail
 * Project detail page — project detail banner + main content.
 *
 * @package midu
 */

get_header();
?>

<div class="project_detail_page">
		<?php
			set_query_var( 'project_banner_bg_image', get_template_directory_uri() . '/assets/images/project_detail_banner.jpg' );
			set_query_var( 'project_banner_title', 'A next-generation mixed-use development designed to enrich community living.' );
			set_query_var( 'project_banner_description', "This landmark development represents MIDU's commitment to delivering future-ready spaces that combine innovation, sustainability, and community value. Designed with a long-term vision, the project integrates residential, commercial, and lifestyle components to support modern living and economic growth." );
			get_template_part( 'template-parts/project-detail-banner' );
			?>
	<div class="main_content">
		<div class="container project_breadcrumb_sec">
			<div class="breadcrumb breadcrumb-white">
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/home.svg' ); ?>" alt="Home"></a></li>
					<li><a href="<?php echo esc_url( home_url( '/projects' ) ); ?>">Projects</a></li>
					<li><span>A concise introduction capturing the project’s essence.</span></li>
				</ul>
			</div>
			<?php
			// Add further project detail sections here (overview, gallery, etc.)
			?>
		</div>
		<div class="project_detail_top_sec">
			<?php
			set_query_var( 'key_details_title', 'Key Details' );
			set_query_var( 'key_details_subtitle', 'Lorem ipsum dolor consectetur adipiscing elit tortor' );
			set_query_var( 'key_details_items', array(
				array( 'icon' => 'key_1.svg', 'label' => 'Location', 'value' => 'Riyadh, Saudi Arabia' ),
				array( 'icon' => 'key_2.svg', 'label' => 'Type', 'value' => 'Residential' ),
				array( 'icon' => 'key_3.svg', 'label' => 'Total Area', 'value' => 'XX,000 sqm' ),
				array( 'icon' => 'key_4.svg', 'label' => 'Project Status', 'value' => 'In Progress' ),
				array( 'icon' => 'key_5.svg', 'label' => 'Completion Year', 'value' => '2025' ),
			) );
			get_template_part( 'template-parts/key-details-section' );
			?>
					 <?php
		  // Light-blue-list: all content from page (title, intro, optional subtitle, list with icons)
		  set_query_var('light_blue_list_title', 'Project Objectives');
		  set_query_var('light_blue_list_intro', 'A clear breakdown of the purpose and driving goals:');
		  set_query_var('light_blue_list_center', false);
		  set_query_var('light_blue_list_bg_image', get_template_directory_uri() . '/assets/images/philosophy_farme.png');
		  set_query_var('light_blue_list_items', array(
			  array( 'icon' => 'ob_1.svg', 'title' => 'Enhance community quality of life through thoughtfully designed spaces'),
			  array( 'icon' => 'ob_2.svg', 'title' => 'Support economic growth and attract strategic investment', ),
			  array( 'icon' => 'ob_3.svg', 'title' => 'Introduce sustainable, future-forward development standards' ),
			  array( 'icon' => 'ob_4.svg', 'title' => 'Strengthen infrastructure and regional capabilities'),
			  array( 'icon' => 'ob_5.svg', 'title' => 'Align with Saudi Vision 2030 transformation goals',),
		  ));
		  get_template_part('template-parts/light-blue-list');
		  ?>
			<?php
			set_query_var( 'image_text_block_wrapper_class', 'project_scope_section' );
			set_query_var( 'image_text_title', 'Project Scope' );
			set_query_var( 'image_text_paragraphs', array(
				'Explain what MIDU delivered.',
			) );
			set_query_var( 'image_text_list_paragraph', array() );
			// Why Choose list — change the text below; no paragraphs for this section
			set_query_var( 'image_text_list', array(
				'Master planning and conceptual development',
				'Architectural and engineering design management',
				'Feasibility studies and market analysis',
				'Construction oversight and project management',
				'Smart and sustainable systems integration',
				'End-to-end delivery and operational readiness',
			) );
			set_query_var( 'image_text_image', 'scope_pic.jpg' );
			set_query_var( 'image_text_section_class', ' white_text' );
			get_template_part( 'template-parts/image-text-block' );
			?>
			<?php
			set_query_var( 'image_text_block_wrapper_class', 'project_scope_section' );
			set_query_var( 'image_text_title', 'Design & Features' );
			set_query_var( 'image_text_paragraphs', array(
				'Highlight the distinctive qualities of the project:',
			) );
			set_query_var( 'image_text_list_paragraph', array() );
			// Why Choose list — change the text below; no paragraphs for this section
			set_query_var( 'image_text_list', array(
				'Modern architectural language optimized for efficiency and aesthetics',
				'Smart technology integration for enhanced user experience',
				'High-quality materials and long-term durability',
				'Sustainable water, energy, and waste management systems',
				'Flexible spaces adaptable for future demand',
			) );
			set_query_var( 'image_text_image', 'design_feature.jpg' );
			set_query_var( 'image_text_section_class', ' white_text reverse_direction' );
			get_template_part( 'template-parts/image-text-block' );
			?>

			<?php
			set_query_var( 'image_text_block_wrapper_class', 'project_scope_section' );
			set_query_var( 'image_text_title', 'Impact & Value' );
			set_query_var( 'image_text_paragraphs', array(
				'Explain what the project achieved or will achieve:',
			) );
			set_query_var( 'image_text_list_paragraph', array() );
			// Why Choose list — change the text below; no paragraphs for this section
			set_query_var( 'image_text_list', array(
				'Strengthens the local economy through job creation and investment',
				'Enhances liveability and community wellbeing',
				'Supports regional development objectives and national transformation plans',
				'Provides long-term sustainable value for stakeholders',
				'Acts as a catalyst for future sector growth',
			) );
			set_query_var( 'image_text_image', 'impact_and_value.jpg' );
			set_query_var( 'image_text_section_class', ' white_text' );
			get_template_part( 'template-parts/image-text-block' );
			?>
			<?php
			set_query_var( 'photo_gallery_title', 'Photo Gallery' );
			set_query_var( 'photo_gallery_images', array( 'gal_1.jpg', 'gal_2.jpg', 'gal_3.jpg' ) );
			get_template_part( 'template-parts/photo-gallery-section' );
			?>
	
		</div>
		<?php
		// Featured Projects — Swiper slider of project cards
		$theme_images = get_template_directory_uri() . '/assets/images/';
		set_query_var( 'featured_projects_title', 'Related Projects' );
		set_query_var( 'featured_projects_subtitle', "Lorem ipsum dolor consectetur adipiscing elit tortor" );
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
	</div>
</div>

<?php
get_footer();
