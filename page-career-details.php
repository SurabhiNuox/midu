<?php
/**
 * Template Name: Career Details
 *
 * @package midu
 */

get_header();
?>

<main id="primary" class="site-main detail-page-content career-detail-content">
	<div class="main_content">
		<section class="career_details_section">
			<div class="container">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
				?>
			</div>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();
