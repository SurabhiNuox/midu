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
<main class="main_content">
	<?php get_template_part('template-parts/explore-our-world'); ?>
</main>

<?php
get_footer();

