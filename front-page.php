<?php
/**
 * The front page template file
 *
 * This is the template for the home page
 *
 * @package midu
 */

get_header();
?>

<?php get_template_part('template-parts/main-banner'); ?>
<div class="home_page_content">
	<section class="explore-our-world">
		<div class="frame">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame.svg" alt="Frame">
		</div>
		<?php get_template_part('template-parts/explore-our-world'); ?>
		
	</section>

	<?php get_template_part('template-parts/projects-slider'); ?>
	<div class="intro_vision_wraper">
		<?php get_template_part('template-parts/intro-vision'); ?>
	</div>
	<?php get_template_part('template-parts/sustainability-commitment'); ?>
	<?php get_template_part('template-parts/our-sectors'); ?>
	<?php get_template_part('template-parts/journey-legacy'); ?>
	<?php get_template_part('template-parts/latest-news'); ?>
	<?php get_template_part('template-parts/cta-banner'); ?>
</div>
<?php
get_footer();

