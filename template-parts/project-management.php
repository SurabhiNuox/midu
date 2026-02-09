<?php
/**
 * Template part: Project Management — image, title, intro, list (icon + title), outro.
 *
 * Data: set_query_var( 'pm_title', 'pm_intro', 'pm_heading', 'pm_items', 'pm_outro', 'pm_image', 'pm_image_alt', 'pm_show_overlay' )
 * pm_items = array of array( 'icon' => filename, 'title' => string )
 *
 * @package midu
 */

$theme_img = get_template_directory_uri() . '/assets/images/';

$title   = get_query_var( 'pm_title' ) ?: '';
$intro   = get_query_var( 'pm_intro' ) ?: '';
$heading = get_query_var( 'pm_heading' ) ?: '';
$items   = get_query_var( 'pm_items' );
$outro   = get_query_var( 'pm_outro' ) ?: "";
$image   = get_query_var( 'pm_image' ) ?: $theme_img . 'pm-img.jpg';
$image_alt = get_query_var( 'pm_image_alt' ) ?: esc_attr( $title );
$show_overlay = get_query_var( 'pm_show_overlay' );
$show_overlay = ( $show_overlay !== false && $show_overlay !== '0' );

if ( ! is_array( $items ) || empty( $items ) ) {
	$items = array(
		array( 'icon' => 'pm-icon1.svg', 'title' => 'End-to-end project planning and scheduling' ),
		array( 'icon' => 'pm-icon2.svg', 'title' => 'Contractor and consultant coordination' ),
		array( 'icon' => 'pm-icon3.svg', 'title' => 'Procurement and tender management' ),
		array( 'icon' => 'pm-icon4.svg', 'title' => 'Quality control and compliance' ),
		array( 'icon' => 'pm-icon5.svg', 'title' => 'Budget oversight and cost management' ),
		array( 'icon' => 'pm-icon6.svg', 'title' => 'Progress reporting and performance monitoring' ),
	);
}

foreach ( $items as &$item ) {
	if ( ! empty( $item['icon'] ) && strpos( $item['icon'], '://' ) === false ) {
		$item['icon'] = $theme_img . ltrim( $item['icon'], '/' );
	}
}
unset( $item );
if ( $image !== '' && strpos( $image, '://' ) === false ) {
	$image = $theme_img . ltrim( $image, '/' );
}
?>

<section class="project-management-section" aria-label="<?php echo esc_attr( $title ); ?>">
	<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
	<?php if ( $show_overlay ) : ?>
		<div class="overlay"></div>
	<?php endif; ?>
	<div class="container">
		<div class="project-management_inner">
			<div class="title_main">
				<h2 class="second_title"><?php echo esc_html( $title ); ?></h2>
				<?php if ( $intro ) : ?>
					<p><?php echo esc_html( $intro ); ?></p>
				<?php endif; ?>
				<?php if ( $heading ) : ?>
					<h5 class="project-management_heading"><?php echo esc_html( $heading ); ?></h5>
				<?php endif; ?>
			</div>
			<ul>
				<?php foreach ( $items as $item ) : ?>
					<li>
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<div class="project-management_icon"><img src="<?php echo esc_url( $item['icon'] ); ?>" alt=""></div>
						<?php endif; ?>
						<?php if ( ! empty( $item['title'] ) ) : ?>
							<h4><?php echo esc_html( $item['title'] ); ?></h4>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( $outro ) : ?>
				<p class="text-center"><?php echo esc_html( $outro ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
