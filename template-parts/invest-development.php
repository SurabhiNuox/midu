<?php
/**
 * Template part for displaying the Investment & Development section
 *
 * @package midu
 */

// Content comes only from the page via query vars (no defaults in template)
$invest_title_line1   = get_query_var('invest_title_line1');
$invest_intro         = get_query_var('invest_intro');
$invest_right_heading = get_query_var('invest_right_heading');
$invest_items         = get_query_var('invest_items');

if ( ! is_array( $invest_items ) ) {
	$invest_items = array();
}
$theme_images = get_template_directory_uri() . '/assets/images/';
foreach ( $invest_items as $i => $item ) {
	$icon = isset( $item['icon'] ) ? $item['icon'] : '';
	if ( $icon !== '' && strpos( $icon, '://' ) === false ) {
		$invest_items[ $i ]['icon'] = $theme_images . ltrim( $icon, '/' );
	}
}
$has_left  = ( $invest_title_line1 !== '' && $invest_title_line1 !== false ) || ( $invest_intro !== '' && $invest_intro !== false );
$has_right = ( $invest_right_heading !== '' && $invest_right_heading !== false ) || ! empty( $invest_items );
?>

<section class="invest-development-section">
	  <div class="container">
         <div class="invest-development_inner">
		 <?php if ( $has_left ) : ?>
		 <div class="invest-development_left">
			 <?php if ( $invest_title_line1 !== '' && $invest_title_line1 !== false ) : ?>
				<h2 class="second_title"><?php echo wp_kses( $invest_title_line1, array( 'br' => array() ) ); ?></h2>
			 <?php endif; ?>
			 <?php if ( $invest_intro !== '' && $invest_intro !== false ) : ?>
				<p><?php echo esc_html( $invest_intro ); ?></p>
			 <?php endif; ?>
		 </div>
		 <?php endif; ?>
		 <?php if ( $has_right ) : ?>
		 <div class="invest-development_right">
			 <?php if ( $invest_right_heading !== '' && $invest_right_heading !== false ) : ?>
				<h3 class="invest-development_heading"><?php echo esc_html( $invest_right_heading ); ?></h3>
			 <?php endif; ?>
			 <?php if ( ! empty( $invest_items ) ) : ?>
				<ul class="invest-development_list">
					<?php foreach ( $invest_items as $item ) :
						$icon_url = isset( $item['icon'] ) ? $item['icon'] : '';
						$item_title = isset( $item['title'] ) ? $item['title'] : '';
						if ( $icon_url === '' && $item_title === '' ) { continue; }
					?>
					<li class="invest-development_item">
					
						<div class="invest-development_item_icon">
							<img src="<?php echo esc_url( $icon_url ); ?>" alt="">
						</div>
						
						<?php if ( $item_title !== '' ) : ?>
						<h4 class="invest-development_item_title"><?php echo $item_title; ?></h4>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
			 <?php endif; ?>

			 <p>We lead investments through a structured, disciplined approach <br/> that maximizes returns and minimizes risks.</p>
		 </div>
		 <?php endif; ?>
		 </div>
	  </div>
</section>
