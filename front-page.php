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

<section class="explore-our-world">
	<div class="frame">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame.svg" alt="Frame">
	</div>
	<?php get_template_part('template-parts/explore-our-world'); ?>
	
</section>

<?php get_template_part('template-parts/projects-slider'); ?>
<?php get_template_part('template-parts/intro-vision'); ?>
<?php get_template_part('template-parts/sustainability-commitment'); ?>
<?php get_template_part('template-parts/our-sectors'); ?>
<?php get_template_part('template-parts/journey-legacy'); ?>
<?php get_template_part('template-parts/latest-news'); ?>

<?php
get_footer();

