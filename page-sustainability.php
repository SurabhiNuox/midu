<?php
/**
 * Template Name: Sustainability
 *
 * @package addarah
 */

get_header();

// Image-text (internship) list: default items, override from ACF field "image_text_list" when set
$image_text_list = array(
	'Energy efficiency and smart resource utilization',
	'Sustainable building materials',
	'Water conservation and management',
	'Waste reduction',

);
set_query_var( 'image_text_list', $image_text_list );

// Image-text list paragraphs (repeater): optional paragraphs in first list item, override from ACF "image_text_list_paragraph" when set
$image_text_list_paragraph = array( 'Integrating modern systems that reduce consumption and enhance operational performance.', 
'Sourcing high-quality, low-impact materials that minimize carbon footprint.', 'Utilizing efficient irrigation systems, recycling processes, and optimized usage strategies.', 'Implementing environmentally conscious construction methods and long-term waste management solutions.' );
set_query_var( 'image_text_list_paragraph', $image_text_list_paragraph );


$image_text_list_second = array(
	'Reduce environmental impact',
	'Enhance liveability and community value',
	'Contribute to national sustainability targets',
	'Support a greener, more resilient economy',
);
set_query_var( 'image_text_list_second', $image_text_list_second );

// Paragraphs for second image-text block (one per list item), override from ACF "image_text_list_paragraph_second" when set
$image_text_list_paragraph_second = array();
set_query_var( 'image_text_list_paragraph_second', $image_text_list_paragraph_second );

$image_text_list_third = array(
	'Governance & Compliance',
	'Design & Development Strategy',
	'Performance Monitoring',
	'Stakeholder Engagement',
);
set_query_var( 'image_text_list_third', $image_text_list_third );

// Paragraphs for third image-text block (one per list item), override from ACF "image_text_list_paragraph_third" when set
$image_text_list_paragraph_third = array(
	'Ensuring all projects align with national regulations and leading sustainability standards.',
	'Applying sustainable design principles from concept to construction.',
	'Tracking environmental impact and continuously improving efficiency.',
	'Collaborating with partners, consultants, and communities to drive positive impact.',
);
set_query_var( 'image_text_list_paragraph_third', $image_text_list_paragraph_third );



?>

<main id="primary" class="site-main">
	<?php
	// Set banner variables
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/sus-banner.jpg');
	get_template_part('template-parts/inner-banner');
	?>

	   <div class="main_content">
		  <?php
		  // Set overview section variables
		  set_query_var('overview_title', 'Our Commitment to a Sustainable Future');
		  set_query_var('overview_image', get_template_directory_uri() . '/assets/images/sustainibility.png');
		  set_query_var('overview_content', array(
			  'At MIDU, sustainability is not an added feature—it is a foundational principle that shapes every project, decision, and long-term strategy. We are committed to developing spaces and solutions that balance economic growth with environmental responsibility and societal wellbeing.',
               'Our approach aligns with Saudi Arabia’s Vision 2030 pillars, ensuring that our developments contribute to a more resilient, efficient, and sustainable future for generations to come.'
		  ));
		  get_template_part('template-parts/overview-section');
		  ?>



<div class="curve_top_bottom">
          <div class="curve_top_bottom_inner">
            <div class="container">
			<?php
						   set_query_var( 'image_text_title', 'Environmental Stewardship' );
						   set_query_var( 'image_text_paragraphs', array(
							   'We prioritize responsible environmental practices across all stages of development:',
						   ) );
						   $image_text_list_paragraph = get_query_var( 'image_text_list_paragraph' );
						   if ( function_exists( 'get_field' ) && get_field( 'image_text_list_paragraph' ) ) {
							   $acf_paras = get_field( 'image_text_list_paragraph' );
							   if ( is_array( $acf_paras ) ) {
								   $image_text_list_paragraph = array();
								   foreach ( $acf_paras as $row ) {
									   $image_text_list_paragraph[] = is_array( $row ) ? ( isset( $row['paragraph'] ) ? $row['paragraph'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
								   }
							   }
						   }
						   set_query_var( 'image_text_list_paragraph', $image_text_list_paragraph );
						   $image_text_list = get_query_var( 'image_text_list' );
						   if ( function_exists( 'get_field' ) && get_field( 'image_text_list' ) ) {
							   $acf_list = get_field( 'image_text_list' );
							   if ( is_array( $acf_list ) ) {
								   $image_text_list = array();
								   foreach ( $acf_list as $row ) {
									   $image_text_list[] = is_array( $row ) ? ( isset( $row['item'] ) ? $row['item'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
								   }
							   }
						   }
						   set_query_var( 'image_text_list', $image_text_list );
						   set_query_var( 'image_text_button_url', '#' );
						   set_query_var( 'image_text_button_text', '' );
						   set_query_var( 'image_text_image', 'sus2.png' );
						   set_query_var( 'image_text_image_alt', '' );
						   set_query_var( 'image_text_section_class', 'white_text' );
						   get_template_part( 'template-parts/image-text' );
						   ?>
			
           </div>
           </div>

		   </div>

		   <section class="dark_blue_section_without_curve">
		   <div class="container">
		   <div class="title_main">
			<h2 class="second_title">Social Responsibility</h2>
			<p>MIDU’s projects are designed to uplift communities and enhance quality of life:</p>
			
			</div>
						</div>
						</section>

		   <section class="dark_blue_section_without_curve">
                     <div class="container">
					 <?php
						   set_query_var( 'image_text_title', 'Our Sustainability Framework' );
						   set_query_var( 'image_text_paragraphs', array(
							   'MIDU follows a structured, measurable framework that integrates global best practices:',
						   ) );
						   $image_text_list_paragraph_third = get_query_var( 'image_text_list_paragraph_third' );
						   if ( function_exists( 'get_field' ) && get_field( 'image_text_list_paragraph_third' ) ) {
							   $acf_paras = get_field( 'image_text_list_paragraph_third' );
							   if ( is_array( $acf_paras ) ) {
								   $image_text_list_paragraph_third = array();
								   foreach ( $acf_paras as $row ) {
									   $image_text_list_paragraph_third[] = is_array( $row ) ? ( isset( $row['paragraph'] ) ? $row['paragraph'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
								   }
							   }
						   }
						   set_query_var( 'image_text_list_paragraph', $image_text_list_paragraph_third );
						   $image_text_list_third = get_query_var( 'image_text_list_third' );
						   if ( function_exists( 'get_field' ) && get_field( 'image_text_list_third' ) ) {
							   $acf_list = get_field( 'image_text_list_third' );
							   if ( is_array( $acf_list ) ) {
								   $image_text_list_third = array();
								   foreach ( $acf_list as $row ) {
									   $image_text_list_third[] = is_array( $row ) ? ( isset( $row['item'] ) ? $row['item'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
								   }
							   }
						   }
						   set_query_var( 'image_text_list', $image_text_list_third );
						   set_query_var( 'image_text_button_url', '#' );
						   set_query_var( 'image_text_button_text', '' );
						   set_query_var( 'image_text_image', 'sustainability03.png' );
						   set_query_var( 'image_text_image_alt', '' );
						   set_query_var( 'image_text_section_class', 'white_text reverse_direction' );
						   get_template_part( 'template-parts/image-text' );
						   ?>
					 </div>
						</section>

		  <?php
		  // Light-blue-list: all content from page (title, intro, optional subtitle, list with icons)
		  set_query_var('light_blue_list_title', 'Key Focus Areas');
		  set_query_var('light_blue_list_intro', '');
		  set_query_var('light_blue_list_subtitle', '');
		  set_query_var('light_blue_list_center', false);
		  set_query_var('light_blue_list_section_class', 'sustainability_orange_bg');
		  set_query_var('light_blue_list_items', array(
			  array( 'icon' => 'ser-icon1.svg', 'title' => 'Low-carbon <br/> development' ),
			  array( 'icon' => 'ser-icon2.svg', 'title' => 'Green building <br/> design' ),
			  array( 'icon' => 'ser-icon3.svg', 'title' => 'Smart technology <br/>  integration' ),
			  array( 'icon' => 'ser-icon4.svg', 'title' => 'Climate resilience <br/> planning' ),
			  array( 'icon' => 'ser-icon5.svg', 'title' => 'Community health & <br/> wellbeing' ),
			  array( 'icon' => 'ser-icon6.svg', 'title' => 'Long-term economic <br/> sustainability' ),
		  ));
		  get_template_part('template-parts/light-blue-list');
		  ?>

      <section class="light_blue_section">
		          <div class="container">
				  <?php
						   set_query_var( 'image_text_title', 'Our Impact' );
						   set_query_var( 'image_text_paragraphs', array(
							   'Through sustainable thinking and execution, MIDU delivers developments that:',
						   ) );
						   $image_text_list_paragraph_second = get_query_var( 'image_text_list_paragraph_second' );
						   if ( function_exists( 'get_field' ) && get_field( 'image_text_list_paragraph_second' ) ) {
							   $acf_paras = get_field( 'image_text_list_paragraph_second' );
							   if ( is_array( $acf_paras ) ) {
								   $image_text_list_paragraph_second = array();
								   foreach ( $acf_paras as $row ) {
									   $image_text_list_paragraph_second[] = is_array( $row ) ? ( isset( $row['paragraph'] ) ? $row['paragraph'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
								   }
							   }
						   }
						   set_query_var( 'image_text_list_paragraph', $image_text_list_paragraph_second );
						   $image_text_list_second = get_query_var( 'image_text_list_second' );
						   if ( function_exists( 'get_field' ) && get_field( 'image_text_list_second' ) ) {
							   $acf_list = get_field( 'image_text_list_second' );
							   if ( is_array( $acf_list ) ) {
								   $image_text_list_second = array();
								   foreach ( $acf_list as $row ) {
									   $image_text_list_second[] = is_array( $row ) ? ( isset( $row['item'] ) ? $row['item'] : ( isset( $row['text'] ) ? $row['text'] : reset( $row ) ) ) : $row;
								   }
							   }
						   }
						   set_query_var( 'image_text_list', $image_text_list_second );
						   set_query_var( 'image_text_button_url', '#' );
						   set_query_var( 'image_text_button_text', '' );
						   set_query_var( 'image_text_image', 'impact.png' );
						   set_query_var( 'image_text_image_alt', '' );
						   set_query_var( 'image_text_section_class', '' );
						   get_template_part( 'template-parts/image-text' );
						   ?>
				  </div>

				  <div class="bg_img">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/light-blue-vector.svg" alt="Impact Background">
				  </div>
	  </section>


	   </div>

	   </div>
</main><!-- #main -->

<?php
get_footer();