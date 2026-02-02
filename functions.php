<?php
/**
 * addarah functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package addarah
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function addarah_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on addarah, use a find and replace
	 * to change 'addarah' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('addarah', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'addarah'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'addarah_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'addarah_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function addarah_content_width()
{
	$GLOBALS['content_width'] = apply_filters('addarah_content_width', 640);
}
add_action('after_setup_theme', 'addarah_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function addarah_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'addarah'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'addarah'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'addarah_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function addarah_scripts()
{
	// Enqueue main.css (Footer component styles)
	wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/scss/main.css', array(), _S_VERSION);
	
	wp_enqueue_style('nice', get_template_directory_uri() . '/assets/css/nice-select.css', array(), _S_VERSION);
	// Enqueue WhatsApp button styles (separate file until SCSS is compiled)
	wp_enqueue_style('whatsapp-button-style', get_template_directory_uri() . '/assets/css/whatsapp-button.css', array(), _S_VERSION);

	// Enqueue Lenis Smooth Scroll library (CDN) - loaded on all pages
	wp_enqueue_script('lenis', 'https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js', array(), '1.0.42', false);

	// Enqueue smooth scroll initialization (loaded on all pages)
	wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array('lenis'), _S_VERSION, true);
	
	wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array('lenis'), _S_VERSION, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('lenis'), _S_VERSION, true);
	// Header script removed - not needed for current header implementation

	// Enqueue Footer component script (loaded on all pages)
	wp_enqueue_script('footer-script', get_template_directory_uri() . '/assets/js/Footer.js', array(), _S_VERSION, true);

	// Enqueue WhatsApp floating button script (loaded on all pages)
	wp_enqueue_script('whatsapp-button-script', get_template_directory_uri() . '/assets/js/WhatsAppButton.js', array(), _S_VERSION, true);

	// Removed unused component scripts

	// Enqueue AOS (Animate On Scroll) CSS (CDN) - loaded on all pages
	wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), '2.3.4');

	// Enqueue AOS (Animate On Scroll) library (CDN) - loaded on all pages
	wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), '2.3.4', true);

	// Initialize AOS after DOM is ready (global initialization for all pages)
	wp_add_inline_script('aos-js', 'document.addEventListener("DOMContentLoaded", function() { if (typeof AOS !== "undefined") { AOS.init({ duration: 800, once: false }); } });', 'after');

	// Check if current page uses Company Detail, Investments Detail, or AdDarah Modern Support Services template
	$is_company_detail_page = false;
	$is_addarah_modern_support_page = false;
	$is_group_companies_page = false;
	$is_news_and_media_page = false;
	$is_gallery_page = false;
	$is_about_page = false;
	$is_contact_page = false;
	$is_press_release_detail_page = false;
	$is_all_news_page = false;
	$is_weddings_social_services_page = false;
	if (is_page()) {
		$template = get_page_template_slug();
		$is_company_detail_page = ($template === 'page-company-detail.php' || $template === 'page-investments-detail.php' || $template === 'page-addarah-modern-support-services.php');
		$is_addarah_modern_support_page = ($template === 'page-addarah-modern-support-services.php');
		$is_group_companies_page = ($template === 'page-group-companies.php');
		$is_news_and_media_page = ($template === 'page-news-and-media.php');
		$is_gallery_page = ($template === 'page-gallery.php');
		$is_about_page = ($template === 'page-about.php' || is_page('about') || is_page_template('page-about.php'));
		$is_contact_page = ($template === 'page-contact.php' || is_page('contact') || is_page_template('page-contact.php'));
		$is_press_release_detail_page = ($template === 'page-press-release-detail.php' || is_page_template('page-press-release-detail.php'));
		$is_all_news_page = ($template === 'page-all-news.php' || is_page_template('page-all-news.php'));
		$is_weddings_social_services_page = ($template === 'page-weddings-social-services.php' || is_page_template('page-weddings-social-services.php'));
	}

	// Enqueue Swiper CSS and JS globally (available on all pages)
	if (!wp_style_is('swiper-css', 'enqueued')) {
		wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
	}
	if (!wp_script_is('swiper-js', 'enqueued')) {
		wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);
	}

	// Enqueue component styles for front page
	if (is_front_page()) {
		// Enqueue main banner script (depends on Swiper)
		// Swiper is already loaded globally above, so this will load after it
		wp_enqueue_script('main-banner-script', get_template_directory_uri() . '/assets/js/main-banner.js', array('swiper-js'), _S_VERSION, true);

		// GSAP for Explore Our World section (IntersectionObserver, no ScrollTrigger)
		if (!wp_script_is('gsap', 'enqueued')) {
			wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', false);
		}
		wp_enqueue_script('explore-our-world-script', get_template_directory_uri() . '/assets/js/explore-our-world.js', array('gsap'), _S_VERSION, true);

		// GSAP ScrollTrigger for Projects Slider (pinned scroll)
		if (!wp_script_is('gsap-scrolltrigger', 'enqueued')) {
			wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '3.12.5', false);
		}
		wp_enqueue_script('projects-slider-script', get_template_directory_uri() . '/assets/js/projects-slider.js', array('smooth-scroll'), _S_VERSION, true);

		wp_enqueue_script('intro-vision-script', get_template_directory_uri() . '/assets/js/intro-vision.js', array('gsap'), _S_VERSION, true);
	}


	// Contact page specific scripts
	// Load Swiper and CompanyServices script on Company Detail pages
	if ($is_company_detail_page) {
		// Enqueue Swiper JS (CDN) - only if not already loaded on front page
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);
		}
	}

	// Load Swiper for News and Media page
	if ($is_news_and_media_page) {
		// Enqueue Swiper JS (CDN) - only if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);
		}

		// Enqueue PressReleases script (depends on Swiper)
		wp_enqueue_script('press-releases-script', get_template_directory_uri() . '/assets/js/PressReleases.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load Swiper for Gallery page
	if ($is_gallery_page) {
		// Enqueue Swiper JS (CDN) - only if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);
		}

		// Enqueue VideoGallery script (depends on Swiper)
		wp_enqueue_script('video-gallery-script', get_template_directory_uri() . '/assets/js/VideoGallery.js', array('swiper-js'), _S_VERSION, true);
	}

	// Check if current page is news detail page
	$is_news_detail_page = false;

	// Check for page template
	if (is_page()) {
		$template = get_page_template_slug();
		// Check for exact match, basename match, or template name match
		if ($template) {
			$is_news_detail_page = (
				$template === 'single-news.php' ||
				basename($template) === 'single-news.php' ||
				strpos($template, 'single-news') !== false
			);
		}
	}

	// Also check for single posts (regular posts)
	if (!$is_news_detail_page && is_single() && get_post_type() === 'post') {
		$is_news_detail_page = true;
	}

	// Also check if we're on any singular page that might use the RelatedPressReleases component
	// This is a fallback to ensure the script loads
	if (!$is_news_detail_page && is_singular()) {
		// Check if the page/post might be using the single-news template
		$template = get_page_template_slug();
		if ($template && (strpos($template, 'single-news') !== false || strpos($template, 'news') !== false)) {
			$is_news_detail_page = true;
		}
	}

	// Enqueue scripts for news detail pages
	if ($is_news_detail_page) {
		// Enqueue Swiper if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);
		}
		wp_enqueue_script('news-sidebar-script', get_template_directory_uri() . '/assets/js/NewsSidebar.js', array(), _S_VERSION, true);
		wp_enqueue_script('related-press-releases-script', get_template_directory_uri() . '/assets/js/RelatedPressReleases.js', array('swiper-js'), _S_VERSION, true);
	}


	// Load Swiper for About page

	if ($is_about_page) {

		// Enqueue GSAP library (CDN) if not already loaded
		if (!wp_script_is('gsap', 'enqueued')) {
			wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', false);
		}

		// Enqueue GSAP ScrollTrigger plugin (CDN) if not already loaded
		if (!wp_script_is('gsap-scrolltrigger', 'enqueued')) {
			wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '3.12.5', false);
		}

		// Enqueue Swiper CSS if not already loaded

		if (!wp_style_is('swiper-css', 'enqueued')) {

			wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

		}

		// Enqueue Swiper JS if not already loaded

		if (!wp_script_is('swiper-js', 'enqueued')) {

			wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);

		}

	}














	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'addarah_scripts');

/**
 * Add Google Fonts (REM) to the head
 */
function addarah_add_google_fonts() {
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=REM:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<?php
}
add_action('wp_head', 'addarah_add_google_fonts', 1);

