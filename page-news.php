<?php
/**
 * Template Name: News & Media
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	// Set banner variables
	set_query_var('banner_title', get_the_title());
	set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/media.jpg');
	get_template_part('template-parts/inner-banner');

	// Repeater: set news_card_items so the list uses this array (image, link, title, date per row)
	$news_card_items = array(
		array(
			'image' => get_template_directory_uri() . '/assets/images/news1.png',
			'link'  => '#',
			'title' => 'MIDU announces new strategic partnership',
			'date'  => '05 August 2025',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/news2.png',
			'link'  => '#',
			'title' => 'New development project in the Kingdom',
			'date'  => '28 July 2025',
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/news3.png',
			'link'  => '#',
			'title' => 'Sustainability initiatives update',
			'date'  => '15 July 2025',
		),

        array(
			'image' => get_template_directory_uri() . '/assets/images/news4.png',
			'link'  => '#',
			'title' => 'Sustainability initiatives update',
			'date'  => '15 July 2025',
		),

        array(
			'image' => get_template_directory_uri() . '/assets/images/news1.png',
			'link'  => '#',
			'title' => 'Sustainability initiatives update',
			'date'  => '15 July 2025',
		),


        array(
			'image' => get_template_directory_uri() . '/assets/images/news2.png',
			'link'  => '#',
			'title' => 'Sustainability initiatives update',
			'date'  => '15 July 2025',
		),
	);
	set_query_var( 'news_card_items', $news_card_items );

	// Repeater: event cards (image, link, date_day, date_month, location, title, time)
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

       <section class="news_listing">
            <div class="container">
                <div class="news_list_inner">
                    <div class="news_filter">
                          <form action="" method="get"  class="news-filter-main">
                            <div class="news-filter-serch">
                                <input type="text" name="search" placeholder="Search" class="filter-form-control">
                            </div>
                            <div class="news-filter-select">
                                <select name="filter" id="filter" class="filter-form-control nice-select">
                                    <option value="">All</option>
                                    <option value="1">Corporate</option>
                                    <option value="2">Events</option>
                                    <option value="3">Press Releases</option>
                                    <option value="4">Media Coverage</option>
                                  
                                </select>
                            </div>
                          </form>
                    </div>
                </div>

                <div class="news_listing-main">
                         <h2>Latest News</h2>

                         <div class="news_listing-cards">
                         <ul class="news-card-list">
                            <?php
                            // Repeater: array of items with image, link, title, date (from ACF or set here)
                            $news_card_items = get_query_var( 'news_card_items' );
                            if ( function_exists( 'get_field' ) && get_field( 'news_cards' ) ) {
                                $news_card_items = get_field( 'news_cards' );
                            }
                            if ( ! empty( $news_card_items ) && is_array( $news_card_items ) ) :
                                foreach ( $news_card_items as $item ) :
                                    $img  = isset( $item['image'] ) ? $item['image'] : ( isset( $item['image']['url'] ) ? $item['image']['url'] : '' );
                                    $link = isset( $item['link'] ) ? $item['link'] : ( isset( $item['link']['url'] ) ? $item['link']['url'] : '#' );
                                    $title = isset( $item['title'] ) ? $item['title'] : '';
                                    $date  = isset( $item['date'] ) ? $item['date'] : '';
                                    if ( ! $img ) { $img = get_template_directory_uri() . '/assets/images/news1.png'; }
                                    echo '<li>';
                                    set_query_var( 'news_card_image', $img );
                                    set_query_var( 'news_card_link', $link );
                                    set_query_var( 'news_card_title', $title );
                                    set_query_var( 'news_card_date', $date );
                                    get_template_part( 'template-parts/news-card' );
                                    echo '</li>';
                                endforeach;
                            else :
                                $news_query = new WP_Query( array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => 6,
                                    'orderby'        => 'date',
                                    'post_status'    => 'publish',
                                ) );
                                if ( $news_query->have_posts() ) :
                                    while ( $news_query->have_posts() ) :
                                        $news_query->the_post();
                                        echo '<li>';
                                        get_template_part( 'template-parts/news-card' );
                                        echo '</li>';
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    // Sample repeater content when no repeater and no posts
                                    $news_card_items = array(
                                        array(
                                            'image' => get_template_directory_uri() . '/assets/images/news1.png',
                                            'link'  => '#',
                                            'title' => 'MIDU announces new strategic partnership',
                                            'date'  => '05 August 2025',
                                        ),
                                        array(
                                            'image' => get_template_directory_uri() . '/assets/images/news1.png',
                                            'link'  => '#',
                                            'title' => 'New development project in the Kingdom',
                                            'date'  => '28 July 2025',
                                        ),
                                        array(
                                            'image' => get_template_directory_uri() . '/assets/images/news1.png',
                                            'link'  => '#',
                                            'title' => 'Sustainability initiatives update',
                                            'date'  => '15 July 2025',
                                        ),
                                    );
                                    foreach ( $news_card_items as $item ) :
                                        echo '<li>';
                                        set_query_var( 'news_card_image', $item['image'] );
                                        set_query_var( 'news_card_link', $item['link'] );
                                        set_query_var( 'news_card_title', $item['title'] );
                                        set_query_var( 'news_card_date', $item['date'] );
                                        get_template_part( 'template-parts/news-card' );
                                        echo '</li>';
                                    endforeach;
                                endif;
                            endif;
                            ?>
                         </ul>
                         </div>
                </div>
            </div>
       </section>
		

       <section class="events_listing">
            <div class="container">
                     <h2 class="second_title">Events & Appearances</h2>

                     <div class="events_listing_wrap">
                                 <ul class="event-card-list">
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
                                            echo '<li>';
                                            set_query_var( 'event_card_image', $img );
                                            set_query_var( 'event_card_link', $link );
                                            set_query_var( 'event_card_date_day', $day );
                                            set_query_var( 'event_card_date_month', $month );
                                            set_query_var( 'event_card_location', $loc );
                                            set_query_var( 'event_card_title', $title );
                                            set_query_var( 'event_card_time', $time );
                                            get_template_part( 'template-parts/event-card' );
                                            echo '</li>';
                                        endforeach;
                                    endif;
                                    ?>
                                 </ul>
                     </div>
            </div>
       </section>


	   </div>
</main><!-- #main -->

<?php
get_footer();