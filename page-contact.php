<?php
/**
 * Template Name:  Contact
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	// Set banner variables
	set_query_var('banner_title', 'Contact Us');
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/contact_banner.jpg');
	get_template_part('template-parts/inner-banner');

	
	?>

	   <div class="main_content contact_page">
		   <div class="contact_top_section">
              <div class="container">
                 <?php get_template_part( 'template-parts/contact-top-section' ); ?>
              </div>
           </div>


		   <?php
		// Dark-themed location map (Riyadh by default)
		set_query_var( 'contact_map_lat', 24.7136 );
		set_query_var( 'contact_map_lng', 46.6753 );
		set_query_var( 'contact_map_zoom', 10 );
		set_query_var( 'contact_map_label', 'Riyadh' );
		get_template_part( 'template-parts/contact-map' );
		?>


		   <?php
		// Our Commitment — teal diagonal section with commitment_pic.jpg
		set_query_var( 'commitment_title', 'Corporate Brochure Download' );
		set_query_var( 'commitment_content', array(
			'Learn more about MIDU’s vision, expertise, and expanding portfolio.
Download our official corporate brochure for a complete overview of our services and projects.',
		) );
		set_query_var( 'commitment_image', get_template_directory_uri() . '/assets/images/contact-img.png' );
		$brochure_url = ( function_exists( 'get_field' ) && get_field( 'brochure_url' ) ) ? get_field( 'brochure_url' ) : '#';
		set_query_var( 'commitment_button_url', $brochure_url );
		set_query_var( 'commitment_button_text', 'Download Brochure' );
		set_query_var( 'commitment_button_class', 'white_btn' );
		get_template_part( 'template-parts/commitment-section' );
		?>

		

	   </div>
</main><!-- #main -->

<?php
get_footer();