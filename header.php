<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package midu
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'midu'); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-content">
				<!-- Logo -->
				<div class="site-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-image">
					</a>
				</div>

				<!-- Navigation Menu -->
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'nav-menu',
						)
					);
					?>
				</nav>

				<!-- Language Selector -->
				<div class="language-selector">
					<a href="#" class="lang-link">عربي</a>
				</div>

				<!-- Contact Button -->
				<div class="header-contact">
					<a href="#contact" class="contact-button">
						<span class="button-text">Contact</span>
						<span class="button-icon">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow.svg'); ?>" alt="Arrow Right">
						</span>
					</a>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
