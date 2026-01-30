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

<?php get_template_part('template-parts/intro-vision'); ?>
<?php get_template_part('template-parts/main-banner'); ?>

<section class="explore-our-world">
	<div class="frame">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame.svg" alt="Frame">
	</div>
	<?php get_template_part('template-parts/explore-our-world'); ?>
	
</section>

<?php get_template_part('template-parts/projects-slider'); ?>


<?php
get_footer();

