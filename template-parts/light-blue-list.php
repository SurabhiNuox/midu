<?php
/**
 * Template part for displaying the overview section
 *
 * @package midu
 */

// Content comes only from the page via query vars (no defaults in template)
$light_blue_list_title    = get_query_var('light_blue_list_title');
$light_blue_list_intro    = get_query_var('light_blue_list_intro');
$light_blue_list_subtitle = get_query_var('light_blue_list_subtitle');
$light_blue_list_center   = get_query_var('light_blue_list_center');
$light_blue_list_items    = get_query_var('light_blue_list_items');
$light_blue_list_section_class = get_query_var('light_blue_list_section_class');

$title_class = 'light-blue-list-title' . ( $light_blue_list_center ? ' text-center' : '' );
$has_header  = ( $light_blue_list_title !== '' && $light_blue_list_title !== false ) || ( $light_blue_list_intro !== '' && $light_blue_list_intro !== false ) || ( $light_blue_list_subtitle !== '' && $light_blue_list_subtitle !== false );
$section_class = 'light-blue-list-section' . ( ! empty( $light_blue_list_section_class ) ? ' ' . esc_attr( $light_blue_list_section_class ) : '' );

if ( ! is_array( $light_blue_list_items ) ) {
	$light_blue_list_items = array();
}
$theme_images = get_template_directory_uri() . '/assets/images/';
foreach ( $light_blue_list_items as $i => $item ) {
	$icon = isset( $item['icon'] ) ? $item['icon'] : '';
	if ( $icon !== '' && strpos( $icon, '://' ) === false ) {
		$light_blue_list_items[ $i ]['icon'] = $theme_images . ltrim( $icon, '/' );
	}
}
?>

<section class="<?php echo esc_attr( $section_class ); ?>">

	  <div class="light-blue-list-inner">
	  <div class="container">
		          <?php if ( $has_header ) : ?>
		          <div class="<?php echo esc_attr( $title_class ); ?>">
					<?php if ( $light_blue_list_title !== '' && $light_blue_list_title !== false ) : ?>
						<h2 class="second_title"><?php echo esc_html( $light_blue_list_title ); ?></h2>
					<?php endif; ?>
					<?php if ( $light_blue_list_intro !== '' && $light_blue_list_intro !== false ) : ?>
						<p><?php echo esc_html( $light_blue_list_intro ); ?></p>
					<?php endif; ?>
					<?php if ( $light_blue_list_subtitle !== '' && $light_blue_list_subtitle !== false ) : ?>
						<p><b><?php echo esc_html( $light_blue_list_subtitle ); ?></b></p>
					<?php endif; ?>
				  </div>
				  <?php endif; ?>

				  <?php if ( ! empty( $light_blue_list_items ) ) : ?>
				  <div class="light-blue-list">
                           <ul>
							<?php foreach ( $light_blue_list_items as $item ) :
								$icon_url = isset( $item['icon'] ) ? $item['icon'] : '';
								$item_title = isset( $item['title'] ) ? $item['title'] : '';
								if ( $icon_url === '' && $item_title === '' ) { continue; }
							?>
							<li>
								<div class="light-blue-list-item">
									<?php if ( $icon_url !== '' ) : ?>
									<div class="light-blue-list_icon">
										<img src="<?php echo esc_url( $icon_url ); ?>" alt="">
									</div>
									<?php endif; ?>
									<?php if ( $item_title !== '' ) : ?>
									<h3><?php echo $item_title; ?></h3>
									<?php endif; ?>
								</div>
							</li>
							<?php endforeach; ?>
						   </ul>
				  </div>
				  <?php endif; ?>
	  </div>
		
	</div>
</section>
