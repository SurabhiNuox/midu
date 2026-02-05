<?php
/**
 * Template part: Career Story (Employee Stories testimonial swiper).
 *
 * @package midu
 */

$career_stories = array(
	array(
		'quote'  => '“MIDU has given me the opportunity to work on projects that truly matter. The trust, support, and collaborative culture encourage me to grow professionally while contributing to meaningful outcomes.”',
		'name'   => 'Brian Clark',
		'title'  => 'VP of Marketing',
		'avatar' => get_template_directory_uri() . '/assets/images/story1.jpg',
	),
	array(
		'quote'  => 'Working at MIDU means being part of something bigger. The team’s dedication to excellence and innovation drives me every day.',
		'name'   => 'Sarah Mitchell',
		'title'  => 'Senior Project Lead',
		'avatar' => get_template_directory_uri() . '/assets/images/story1.jpg',
	),
	array(
		'quote'  => 'The culture here values both results and people. I’ve grown more in my role at MIDU than anywhere else in my career.',
		'name'   => 'James Wilson',
		'title'  => 'Director of Operations',
		'avatar' => get_template_directory_uri() . '/assets/images/story1.jpg',
	),
	array(
		'quote'  => 'From day one, MIDU made me feel like family. The opportunities to lead and learn are endless.',
		'name'   => 'Emma Davis',
		'title'  => 'Head of Strategy',
		'avatar' => get_template_directory_uri() . '/assets/images/story1.jpg',
	),
);
if ( function_exists( 'get_field' ) && get_field( 'career_stories' ) ) {
	$career_stories = get_field( 'career_stories' );
}
?>
<section class="career_story_section">
	<div class="career_bg"></div>
	<div class="career_story_inner">
		<div class="container">
			<div class="title_main text-center career_story_title">
				<h2 class="second_title">Employee Stories</h2>
				<p>Explore available roles across our departments and sectors.</p>
			</div>

			<div class="career_story_swiper_wrap">
			
				<div class="swiper career_story_swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $career_stories as $story ) : ?>
							<?php
							$quote  = isset( $story['quote'] ) ? $story['quote'] : '';
							$name   = isset( $story['name'] ) ? $story['name'] : '';
							$title  = isset( $story['title'] ) ? $story['title'] : '';
							$avatar = isset( $story['avatar'] ) ? $story['avatar'] : '';
							if ( is_array( $avatar ) && ! empty( $avatar['url'] ) ) {
								$avatar = $avatar['url'];
							}
							if ( empty( $avatar ) ) {
								$avatar = get_template_directory_uri() . '/assets/images/career-story-avatar.jpg';
							}
							?>
							<div class="swiper-slide">
								<div class="career_story_card">
									<span class="career_story_quote_icon">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/quote.svg" alt="Quote Icon">
									</span>
									<p class="career_story_quote_text"><?php echo esc_html( $quote ); ?></p>
									<div class="career_story_author">
										<img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $name ); ?>" class="career_story_avatar" width="56" height="56" loading="lazy">
										<div class="career_story_author_info">
											<strong class="career_story_name"><?php echo esc_html( $name ); ?></strong>
											<span class="career_story_role"><?php echo esc_html( $title ); ?></span>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="career_story_pagination swiper-pagination"></div>
			</div>
		</div>
	</div>
</section>
