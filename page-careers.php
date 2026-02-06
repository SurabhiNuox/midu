<?php
/**
 * Template Name:  Careers
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	// Set banner variables
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/careers-banner.jpg');
	get_template_part('template-parts/inner-banner');

	// Repeater: career cards (title, date, location, time/employment type, link)
	$career_card_items = array(
		array(
			'title'    => 'Chief Financial Officer',
			'date'     => 'Posted 18 Hours Ago',
			'location' => 'Riyadh, Saudi Arabia',
			'time'     => 'Full-Time',
			'link'     => '#',
		),
		array(
			'title'    => 'Senior Project Manager',
			'date'     => 'Posted 2 Days Ago',
			'location' => 'Jeddah, Saudi Arabia',
			'time'     => 'Full-Time',
			'link'     => '#',
		),

        array(
			'title'    => 'Chief Financial Officer',
			'date'     => 'Posted 18 Hours Ago',
			'location' => 'Riyadh, Saudi Arabia',
			'time'     => 'Full-Time',
			'link'     => '#',
		),
		array(
			'title'    => 'Senior Project Manager',
			'date'     => 'Posted 2 Days Ago',
			'location' => 'Jeddah, Saudi Arabia',
			'time'     => 'Full-Time',
			'link'     => '#',
		),

        array(
			'title'    => 'Chief Financial Officer',
			'date'     => 'Posted 18 Hours Ago',
			'location' => 'Riyadh, Saudi Arabia',
			'time'     => 'Full-Time',
			'link'     => '#',
		),
		array(
			'title'    => 'Senior Project Manager',
			'date'     => 'Posted 2 Days Ago',
			'location' => 'Jeddah, Saudi Arabia',
			'time'     => 'Full-Time',
			'link'     => '#',
		),
		
	);
	set_query_var( 'career_card_items', $career_card_items );

	// Image-text (internship) list: default items, override from ACF field "image_text_list" when set
	$image_text_list = array(
		'Summer Internships',
		'Graduate Programs',
		'On-site training across projects and departments',
		'Mentorship from senior experts',
		'Performance-based hiring opportunities',
	);
	set_query_var( 'image_text_list', $image_text_list );

	// Image-text list paragraphs (repeater): optional paragraphs in first list item, override from ACF "image_text_list_paragraph" when set
	$image_text_list_paragraph = array( '' );
	set_query_var( 'image_text_list_paragraph', $image_text_list_paragraph );
	?>

	   <div class="main_content">
		   <div class="careers_top_section">
              <div class="container flex d_flex_wrap">
              <div class="careers_top_left">
                <h2 class="second_title">Explore Our <br/> World</h2>
              </div>
              <div class="careers_top_right">
                <p>At MIDU, we believe people are the foundation of every successful development.</p>
                <p>We are committed to nurturing talent, empowering future leaders, and creating an environment where individuals can grow, innovate, and make a meaningful impact.</p>
                <p>Whether you're an experienced professional or an aspiring graduate, MIDU offers opportunities to contribute to transformative projects shaping the future of Saudi Arabia.</p>
              </div>
              </div>
           </div>

           <div class="careers_list_section">
           <div class="career-list_main">
            <div class="career-list_main_inner">
            <div class="container">
           <div class="title_main">
           
			<h2 class="second_title">Current Openings</h2>
			<p>Explore available roles across our departments and sectors.</p>
            </div>
            </div>
           
            <div class="container">
			<ul class="career-card-list">
				<?php
				$career_card_items = get_query_var( 'career_card_items' );
				if ( function_exists( 'get_field' ) && get_field( 'career_cards' ) ) {
					$career_card_items = get_field( 'career_cards' );
				}
				if ( ! empty( $career_card_items ) && is_array( $career_card_items ) ) :
					foreach ( $career_card_items as $item ) :
						$title    = isset( $item['title'] ) ? $item['title'] : '';
						$date     = isset( $item['date'] ) ? $item['date'] : '';
						$location = isset( $item['location'] ) ? $item['location'] : '';
						$time     = isset( $item['time'] ) ? $item['time'] : '';
						$link     = isset( $item['link'] ) ? $item['link'] : ( isset( $item['link']['url'] ) ? $item['link']['url'] : '#' );
						echo '<li>';
						set_query_var( 'career_card_title', $title );
						set_query_var( 'career_card_date', $date );
						set_query_var( 'career_card_location', $location );
						set_query_var( 'career_card_time', $time );
						set_query_var( 'career_card_link', $link );
						get_template_part( 'template-parts/career-card' );
						echo '</li>';
					endforeach;
				endif;
				?>
			</ul>
             
            <div class="career_btn_main">
            <a href="<?php echo esc_url( $career_link ); ?>" class="btn-primary">
			<span class="button-text">Load more</span>
			<span class="button-icon">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Arrow Right">
									</span>
		</a>

        </div>

            
			</div>
			</div>
            </div>
           </div>


		   <?php get_template_part('template-parts/career-life'); ?>

		   <?php get_template_part('template-parts/career-story'); ?>

		   <section class="career_intenship_section">
                     <div class="container">
						   <?php
						   set_query_var( 'image_text_title', 'Internship & Graduate Programs' );
						   set_query_var( 'image_text_paragraphs', array(
							   'Nurturing the next generation of developers, engineers, planners, and innovators.',
							   'MIDU\'s Internship & Graduate Programs provide hands-on experience, mentorship from industry experts, and exposure to real-world projects.',
							   'We aim to support ambitious students and fresh graduates as they develop the skills needed to contribute to the Kingdom\'s growing development landscape.',
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
						   set_query_var( 'image_text_button_text', 'Apply for Internship' );
						   set_query_var( 'image_text_image', 'career-bottom.png' );
						   set_query_var( 'image_text_image_alt', '' );
						   set_query_var( 'image_text_section_class', '' );
						   get_template_part( 'template-parts/image-text' );
						   ?>
					 </div>
		   </section>

	   </div>
</main><!-- #main -->

<?php
get_footer();