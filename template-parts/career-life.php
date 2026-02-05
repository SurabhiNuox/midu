<?php
/**
 * Template part: Career Life
 * Horizontal timeline with years, nav arrows, and content cards (image + text + image).
 *
 * @package midu
 */

$career_life_youtube_id = 'dQw4w9WgXcQ'; // Change to your YouTube video ID
$career_life_youtube_embed = 'https://www.youtube.com/embed/' . $career_life_youtube_id . '?autoplay=1';
?>
<section class="career_life_section">
	  <div class="container">
		<div class="career_life_title">
			     <div class="career_life_title_left">
							<h2 class="second_title">Life <br/>at MIDU</h2>
						</div>

							 <div class="career_life_title_right">
								<p>At MIDU, we foster a culture built on collaboration, innovation, and continuous growth.<br/>
								Our teams work across diverse disciplines, engaging in projects that challenge conventional thinking and contribute to national development.</p>
							 </div>
		</div>


		<a href="<?php echo esc_url( $career_life_youtube_embed ); ?>" class="career_life_video" data-fancybox data-type="iframe" title="Life at MIDU">
			<div class="play_icon"></div>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/career-video.png" alt="Career Life Video">
		</a>

		<div class="career_life_list">
			<ul>
				<li>
				<div class="career_life_item">
				<div class="career_life_icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/life1.svg" alt="Career Life Icon">
				</div>

				<h3>Competitive salary and benefits</h3>

				<p>Lorem ipsum dolor sit amet consectetur adipiscing Lorem ipsum dolor sit amet consectetur adipiscing</p>

				</div>
				</li>

				<li>
				<div class="career_life_item">
				<div class="career_life_icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/life2.svg" alt="Career Life Icon">
				</div>

				<h3>Collaborative work culture</h3>

				<p>Lorem ipsum dolor sit amet consectetur adipiscing Lorem ipsum dolor sit amet consectetur adipiscing</p>

				</div>
				</li>


				<li>
				<div class="career_life_item">
				<div class="career_life_icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/life3.svg" alt="Career Life Icon">
				</div>

				<h3>Exposure to major national projects</h3>

				<p>Lorem ipsum dolor sit amet consectetur adipiscing Lorem ipsum dolor sit amet consectetur adipiscing</p>

				</div>
				</li>


				<li>
				<div class="career_life_item">
				<div class="career_life_icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/life4.svg" alt="Career Life Icon">
				</div>

				<h3>Competitive salary and benefits</h3>

				<p>Lorem ipsum dolor sit amet consectetur adipiscing Lorem ipsum dolor sit amet consectetur adipiscing</p>

				</div>
				</li>
			</ul>

		</div>
	  </div>
</section>
