<?php
/**
 * Template part: Latest News
 * Section with "Latest News" title, "View all news" button, and Swiper slider of news cards.
 * Each slide uses the news-card template part.
 *
 * @package midu
 */

$latest_news_items = array(
	array(
		'image' => get_template_directory_uri() . '/assets/images/news1.png',
		'link'  => home_url( '/news' ),
		'title' => 'MIDU announces new strategic partnership',
		'date'  => '05 August 2025',
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news2.png',
		'link'  => home_url( '/news' ),
		'title' => 'New development project in the Kingdom',
		'date'  => '28 July 2025',
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news3.png',
		'link'  => home_url( '/news' ),
		'title' => 'Sustainability initiatives update',
		'date'  => '15 July 2025',
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/news4.png',
		'link'  => home_url( '/news' ),
		'title' => 'MIDU expands regional presence',
		'date'  => '01 July 2025',
	),
);

$view_all_url = home_url( '/news' );
?>

<section class="latest-news" aria-label="Latest News">
	<div class="latest-news__shape" aria-hidden="true"></div>
	<div class="container latest-news__inner">
		<header class="latest-news__header">
			<h2 class="latest-news__title">Latest News</h2>
			<a href="<?php echo esc_url( $view_all_url ); ?>" class="btn btn-primary">
				<span class="latest-news__view-all-text">View all news</span>
				<span class="button-icon">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="" width="16" height="16" aria-hidden="true">
				</span>
			</a>
		</header>

		<div class="latest-news__slider-wrap">
			<div class="swiper latest-news-swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $latest_news_items as $item ) : ?>
					<div class="swiper-slide">
						<?php
						set_query_var( 'news_card_image', $item['image'] );
						set_query_var( 'news_card_link', $item['link'] );
						set_query_var( 'news_card_title', $item['title'] );
						set_query_var( 'news_card_date', $item['date'] );
						get_template_part( 'template-parts/news-card' );
						?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="button" class="latest-news__nav latest-news__nav--prev" aria-label="Previous news">
				 <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/news_arw_left.png' ); ?>" alt="" width="16" height="16" aria-hidden="true">
			</button>
			<button type="button" class="latest-news__nav latest-news__nav--next" aria-label="Next news">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/news_arw_right.png' ); ?>" alt="" width="16" height="16" aria-hidden="true">

			</button>
		</div>
	</div>
</section>
