<?php
/**
 * Template Name: Event Details
 *
 * @package midu
 */

get_header();
?>


<main id="primary" class="site-main">
	<?php
	

	// Repeater: set news_card_items so the list uses this array (image, link, title, date per row)
	$event_card_items = array(
		array(
			'image'      => get_template_directory_uri() . '/assets/images/event1.png',
			'link'       => '#',
			'date_day'   => '30',
			'date_month' => 'Jun',
			'location'   => 'Riyadh, KSA',
			'title'      => 'Lorem ipsum dolor sit amet consectetur adipiscing',
			'time'       => '3:00 PM – 4:00 PM',
		),
		array(
			'image'      => get_template_directory_uri() . '/assets/images/event2.png',
			'link'       => '#',
			'date_day'   => '15',
			'date_month' => 'Jul',
			'location'   => 'Jeddah, KSA',
			'title'      => 'Lorem ipsum dolor sit amet consectetur adipiscing',
			'time'       => '10:00 AM – 12:00 PM',
		),
		array(
			'image'      => get_template_directory_uri() . '/assets/images/event3.png',
			'link'       => '#',
			'date_day'   => '22',
			'date_month' => 'Aug',
			'location'   => 'Riyadh, KSA',
			'title'      => 'Lorem ipsum dolor sit amet consectetur adipiscing',
			'time'       => '2:00 PM – 5:00 PM',
		),

        array(
			'image'      => get_template_directory_uri() . '/assets/images/event4.png',
			'link'       => '#',
			'date_day'   => '22',
			'date_month' => 'Aug',
			'location'   => 'Riyadh, KSA',
			'title'      => 'Lorem ipsum dolor sit amet consectetur adipiscing',
			'time'       => '2:00 PM – 5:00 PM',
		),


        array(
			'image'      => get_template_directory_uri() . '/assets/images/event5.png',
			'link'       => '#',
			'date_day'   => '22',
			'date_month' => 'Aug',
			'location'   => 'Riyadh, KSA',
			'title'      => 'Lorem ipsum dolor sit amet consectetur adipiscing',
			'time'       => '2:00 PM – 5:00 PM',
		),


        array(
			'image'      => get_template_directory_uri() . '/assets/images/event6.png',
			'link'       => '#',
			'date_day'   => '22',
			'date_month' => 'Aug',
			'location'   => 'Riyadh, KSA',
			'title'      => 'Lorem ipsum dolor sit amet consectetur adipiscing',
			'time'       => '2:00 PM – 5:00 PM',
		),
	);
	set_query_var( 'event_card_items', $event_card_items );

	
	?>

	   <div class="main_content">

       
       <section class="news_details_section">
            <div class="container">

            <div class="breadcrumb">
                 <ul>
                    <li><a href="<?php echo home_url(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home.svg" alt="Home"></a></li>
                    <li><a href="<?php echo home_url(); ?>">News & Media</a></li>
                    <li><span>MIDU announces new strategic partnership</span></li>
                 </ul>
            </div>

            <div class="news_detail_main">
            <h2 class="second_title">Lorem ipsum dolor sit amet consectetur adipiscing</h2>
            <div class="news_date">September 03, 2020</div>

            <div class="news_detil_img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/event-detail.png" alt="News Detail Image">
            </div>

            </div>

            <div class="news_details_content">
                   <div class="news_details_left">
                          <div class="event_details_main">
							   <h3>Date and Time</h3>
							   <div class="event_details_badges">
								   <span class="event_details_badge">
									   <svg class="event_details_icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
									   <span><?php echo esc_html( get_post_meta( get_the_ID(), 'event_date', true ) ?: 'February 13th – 15th, 2025' ); ?></span>
								   </span>
								   <span class="event_details_badge">
									   <svg class="event_details_icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
									   <span><?php echo esc_html( get_post_meta( get_the_ID(), 'event_time', true ) ?: '09:30 AM - 12:00 PM' ); ?></span>
								   </span>
							   </div>
							   <div class="event_details_map">
								   <?php
								   $map_embed = get_post_meta( get_the_ID(), 'event_map_embed', true );
								   if ( $map_embed ) {
									   echo $map_embed;
								   } else {
									   ?>
									   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.123456789!2d46.6722!3d24.7136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDQyJzQ5LjAiTiA0NsKwNDAnMjAuMCJF!5e0!3m2!1sen!2ssa!4v1234567890" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Event location"></iframe>
									   <?php
								   }
								   ?>
							   </div>
							   <p class="event_details_location">
								   <svg class="event_details_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="9" r="2.5" stroke="currentColor" stroke-width="2"/></svg>
								   <?php echo esc_html( get_post_meta( get_the_ID(), 'event_location', true ) ?: 'Riyadh - Kingdom of Saudi Arabia' ); ?>
							   </p>
						  </div>
				
                   </div> 
                   <div class="news_details_right">
                       <h3>Dubai, UAE, 25 August 2020</h3>
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin elementum justo quis tempor elementum. Cras dapibus, ante non egestas viverra, mi ante venenatis est, non feugiat sem elit eu nisl. Vivamus efficitur luctus rutrum. Nulla nisi turpis, elementum in cursus venenatis, vehicula non ante. Maecenas fermentum odio ut nisi tempus interdum. Sed posuere, mi eu tempor accumsan, mi sem consectetur quam, vel ultrices sapien enim sit amet felis. Phasellus mattis nulla ac condimentum scelerisque. Etiam accumsan non neque eget mattis. Vestibulum luctus fermentum sodales. Vivamus finibus cursus mollis. Integer condimentum finibus nibh id egestas. Curabitur efficitur nibh eros, in interdum risus ultrices at. Mauris neque lorem, fringilla sit amet elementum vitae, posuere a velit. Proin ac neque non nisi bibendum tincidunt id et neque.
                       </p>

                       <p>Donec pellentesque orci tincidunt, ultricies dui at, pharetra metus. In in dolor egestas, lacinia enim vel, congue turpis. Nam in ligula lobortis, ultrices purus ut, sodales orci. Donec nulla nibh, condimentum in mauris quis, molestie luctus diam. Sed eget enim quis sapien fermentum consequat. Morbi dictum molestie lorem, ut faucibus enim sodales quis. Quisque nec augue consectetur justo facilisis laoreet. Nunc vulputate interdum nunc, nec tincidunt felis pellentesque fringilla. Sed elementum sed sem tempus tempus. Cras dapibus efficitur diam vitae finibus. Sed nec metus dolor. Praesent consequat eget purus id laoreet. Sed luctus, nibh sit amet ultricies placerat, orci dui imperdiet nibh, a porta arcu nisi eget nisl. Pellentesque quis rhoncus velit. Mauris pellentesque dui sed orci efficitur lobortis. Proin aliquet fringilla accumsan.</p>

                       <p>Morbi a ex ac sem malesuada elementum. Aliquam posuere dui quis mattis tincidunt. Maecenas iaculis est vitae dui luctus porttitor. Aliquam tristique iaculis dolor porta euismod. Sed eu lacus maximus, cursus risus vitae, scelerisque nulla. Quisque porttitor velit velit, id sagittis sem imperdiet sed. Ut pulvinar vestibulum orci ut lobortis. Donec facilisis justo ac mauris mattis posuere vitae ac elit.</p>

                       <p>Phasellus quis maximus risus. Etiam dictum vel libero eu convallis. Etiam accumsan dolor vitae augue aliquet mattis placerat et nisi. Suspendisse sollicitudin imperdiet metus hendrerit lobortis. Integer vulputate sodales odio, id ullamcorper nibh faucibus ac. Morbi blandit tincidunt libero, et pulvinar sem. Pellentesque tristique magna sed nisl porttitor, in faucibus lorem vulputate. Nullam cursus turpis lacinia nibh rhoncus imperdiet. Nunc vel magna consequat, finibus quam id, posuere dui.</p>
                   </div>
            </div>
          

            </div>
       </section>

       <section class="related_news_listing">
            <div class="container">

          
            

                <div class="news_listing-main">
                         <h2>Related Events</h2>

                         <div class="events_listing_wrap">
                         <div class="swiper relatedSwiper">
                            <div class="swiper-wrapper event-card-list">
                            <?php
                                    $event_card_items = get_query_var( 'event_card_items' );
                                    if ( function_exists( 'get_field' ) && get_field( 'event_cards' ) ) {
                                        $event_card_items = get_field( 'event_cards' );
                                    }
                                    if ( ! empty( $event_card_items ) && is_array( $event_card_items ) ) :
                                        foreach ( $event_card_items as $item ) :
                                            $img   = isset( $item['image'] ) ? $item['image'] : ( isset( $item['image']['url'] ) ? $item['image']['url'] : '' );
                                            $link  = isset( $item['link'] ) ? $item['link'] : ( isset( $item['link']['url'] ) ? $item['link']['url'] : '#' );
                                            $day   = isset( $item['date_day'] ) ? $item['date_day'] : '';
                                            $month = isset( $item['date_month'] ) ? $item['date_month'] : '';
                                            $loc   = isset( $item['location'] ) ? $item['location'] : '';
                                            $title = isset( $item['title'] ) ? $item['title'] : '';
                                            $time  = isset( $item['time'] ) ? $item['time'] : '';
                                            if ( ! $img ) { $img = get_template_directory_uri() . '/assets/images/news1.png'; }
                                            echo '<div class="swiper-slide">';
                                            set_query_var( 'event_card_image', $img );
                                            set_query_var( 'event_card_link', $link );
                                            set_query_var( 'event_card_date_day', $day );
                                            set_query_var( 'event_card_date_month', $month );
                                            set_query_var( 'event_card_location', $loc );
                                            set_query_var( 'event_card_title', $title );
                                            set_query_var( 'event_card_time', $time );
                                            get_template_part( 'template-parts/event-card' );
                                            echo '</div>';
                                        endforeach;
                                    endif;
                                    ?>
                            </div>
                          
                         </div>
                         </div>
                </div>
            </div>
       </section>
		

   


	   </div>
</main><!-- #main -->

<?php
get_footer();
