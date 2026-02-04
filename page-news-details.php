<?php
/**
 * Template Name: News Details
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	

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
            <h2 class="second_title">MIDU Announces New Mixed-Use Development in Riyadh</h2>
            <div class="news_date">September 03, 2020</div>

            <div class="news_detil_img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news-detail.png" alt="News Detail Image">
            </div>

            </div>

            <div class="news_details_content">
                   <div class="news_details_left">
                   <a href="#" class="btn-primary">
									<span class="button-text">Update</span>
									<span class="button-icon">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Arrow Right">
									</span>
								</a>

                                <h5>News - November 13, 2024</h5>

                                <div class="news-social">
                                    <label for="">Share:</label>
						<a href="#" class="social-icon" aria-label="LinkedIn">
							<span class="icon-facebook"></span>
						</a>
						<a href="#" class="social-icon" aria-label="Twitter/X">
							<span class="icon-twitter"></span>
						</a>
						<a href="#" class="social-icon" aria-label="Instagram">
							<span class="icon-Instagram"></span>
						</a>
						<a href="#" class="social-icon" aria-label="YouTube">
							<span class="icon-linkedin"></span>
						</a>
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
                         <h2>Related News</h2>

                         
                         <div class="swiper relatedSwiper">
                            <div class="swiper-wrapper news-card-list">
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
                                    echo '<div class="swiper-slide">';
                                    set_query_var( 'news_card_image', $img );
                                    set_query_var( 'news_card_link', $link );
                                    set_query_var( 'news_card_title', $title );
                                    set_query_var( 'news_card_date', $date );
                                    get_template_part( 'template-parts/news-card' );
                                    echo '</div>';
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
                                        echo '<div class="swiper-slide">';
                                        get_template_part( 'template-parts/news-card' );
                                        echo '</div>';
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
                                        echo '<div class="swiper-slide">';
                                        set_query_var( 'news_card_image', $item['image'] );
                                        set_query_var( 'news_card_link', $item['link'] );
                                        set_query_var( 'news_card_title', $item['title'] );
                                        set_query_var( 'news_card_date', $item['date'] );
                                        get_template_part( 'template-parts/news-card' );
                                        echo '</div>';
                                    endforeach;
                                endif;
                            endif;
                            ?>
                            </div>
                          
                         
                         </div>
                </div>
            </div>
       </section>
		

   


	   </div>
</main><!-- #main -->

<?php
get_footer();