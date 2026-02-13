<?php
/**
 * Template Name: Sitemap
 * Displays an HTML sitemap of all published pages and main site sections.
 *
 * @package midu
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="sitemap-page">
	<?php
	// Optional: set custom banner title (leave empty to use page title or slug)
	set_query_var( 'banner_title', 'About Us' );
	set_query_var( 'banner_bg_image', get_template_directory_uri() . '/assets/images/about_banner.jpg' );
	get_template_part( 'template-parts/inner-banner' );
	?>

			<div class="container">
				<div class="sitemap-content">

					<?php
					// Main site structure (primary routes from the theme)
					$main_pages = array(
						array(
							'title' => __( 'Home', 'midu' ),
							'url'   => home_url( '/' ),
						),
						array(
							'title' => __( 'About MIDU', 'midu' ),
							'url'   => home_url( '/about' ),
						),
						array(
							'title' => __( 'Sectors', 'midu' ),
							'url'   => home_url( '/sectors' ),
						),
						array(
							'title' => __( 'Projects', 'midu' ),
							'url'   => home_url( '/projects' ),
						),
						array(
							'title' => __( 'Services', 'midu' ),
							'url'   => home_url( '/services' ),
						),
						array(
							'title' => __( 'Sustainability', 'midu' ),
							'url'   => home_url( '/sustainability' ),
						),
						array(
							'title' => __( 'News & Media', 'midu' ),
							'url'   => home_url( '/news-media' ),
						),
						array(
							'title' => __( 'Careers', 'midu' ),
							'url'   => home_url( '/careers' ),
						),
						array(
							'title' => __( 'Contact', 'midu' ),
							'url'   => home_url( '/contact' ),
						),
						array(
							'title' => __( 'Project Detail', 'midu' ),
							'url'   => home_url( '/project-detail' ),
						),
					);
					?>

					<section class="sitemap-section" aria-label="<?php esc_attr_e( 'Main pages', 'midu' ); ?>">
						<h2 class="sitemap-section__title"><?php esc_html_e( 'Main Pages', 'midu' ); ?></h2>
						<ul class="sitemap-list">
							<?php foreach ( $main_pages as $item ) : ?>
								<li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</section>

					<?php
					// All published WordPress pages (excluding the sitemap page itself and duplicates by URL)
					$all_pages = get_pages( array(
						'sort_column'  => 'menu_order, post_title',
						'sort_order'   => 'ASC',
						'hierarchical' => 1,
						'post_status'  => 'publish',
					) );

					if ( ! empty( $all_pages ) ) :
						$main_urls = array_column( $main_pages, 'url' );
						?>
						<section class="sitemap-section" aria-label="<?php esc_attr_e( 'All pages', 'midu' ); ?>">
							<h2 class="sitemap-section__title"><?php esc_html_e( 'All Pages', 'midu' ); ?></h2>
							<ul class="sitemap-list sitemap-list--all">
								<?php foreach ( $all_pages as $page ) :
									$url = get_permalink( $page );
									$is_main = in_array( rtrim( $url, '/' ), array_map( 'rtrim', $main_urls, array_fill( 0, count( $main_urls ), '/' ) ), true );
									?>
									<li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $page->post_title ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</section>
					<?php endif; ?>

					<?php
					// Legal / footer links if they exist as pages
					$legal = array(
						array( 'title' => __( 'Terms and Conditions', 'midu' ), 'url' => home_url( '/terms' ) ),
						array( 'title' => __( 'Privacy Policy', 'midu' ), 'url' => home_url( '/privacy' ) ),
					);
					?>
					<section class="sitemap-section" aria-label="<?php esc_attr_e( 'Legal', 'midu' ); ?>">
						<h2 class="sitemap-section__title"><?php esc_html_e( 'Legal', 'midu' ); ?></h2>
						<ul class="sitemap-list">
							<?php foreach ( $legal as $item ) : ?>
								<li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</section>
				</div>
			</div>

	</div>
</main>

<?php
get_footer();
