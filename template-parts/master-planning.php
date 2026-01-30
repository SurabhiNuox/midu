<?php
/**
 * Template part for displaying the master planning section
 * All content (h2, p, h5, ul li) comes from the page via query vars.
 * title_main text-center is controlled by master_planning_title_center (true/false).
 *
 * @package midu
 */

$master_planning_title_center = get_query_var('master_planning_title_center');
$master_planning_h2          = get_query_var('master_planning_h2');
$master_planning_p           = get_query_var('master_planning_p');
$master_planning_h5         = get_query_var('master_planning_h5');
$master_planning_items      = get_query_var('master_planning_items');

$title_main_class = 'title_main' . ( $master_planning_title_center ? ' text-center' : '' );
if ( ! is_array( $master_planning_items ) ) {
	$master_planning_items = array();
}
$theme_images = get_template_directory_uri() . '/assets/images/';
foreach ( $master_planning_items as $i => $item ) {
	$icon = isset( $item['icon'] ) ? $item['icon'] : '';
	if ( $icon !== '' && strpos( $icon, '://' ) === false ) {
		$master_planning_items[ $i ]['icon'] = $theme_images . ltrim( $icon, '/' );
	}
}
?>

<section class="master-planning-section">

	<div class="container">
		<div class="<?php echo esc_attr( $title_main_class ); ?>">
			<?php if ( $master_planning_h2 !== '' && $master_planning_h2 !== false ) : ?>
				<h2 class="second_title"><?php echo esc_html( $master_planning_h2 ); ?></h2>
			<?php endif; ?>
			<?php if ( $master_planning_p !== '' && $master_planning_p !== false ) : ?>
				<p><?php echo esc_html( $master_planning_p ); ?></p>
			<?php endif; ?>
			<?php if ( $master_planning_h5 !== '' && $master_planning_h5 !== false ) : ?>
				<h5><?php echo esc_html( $master_planning_h5 ); ?></h5>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $master_planning_items ) ) : ?>
		<div class="master-planning-list">
			<ul>
				<?php foreach ( $master_planning_items as $item ) :
					$icon_url  = isset( $item['icon'] ) ? $item['icon'] : '';
					$item_title = isset( $item['title'] ) ? $item['title'] : '';
					if ( $item_title === '' ) { continue; }
				?>
				<li>
					<div class="master-planning-box">
						<?php if ( $icon_url !== '' ) : ?>
						<div class="master-planning-icon"><img src="<?php echo esc_url( $icon_url ); ?>" alt="Master Planning"></div>
						<?php endif; ?>
						<h4><?php echo esc_html( $item_title ); ?></h4>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</section>
