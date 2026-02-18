<?php
/**
 * Template part: Mission/Vision card — image on top, white text box below (overlapping).
 *
 * Data: set_query_var( 'mv_card_image', 'mv_card_title', 'mv_card_content' )
 *
 * @package midu
 */

$image  = get_query_var( 'mv_card_image' ) ?: '';
$title  = get_query_var( 'mv_card_title' ) ?: '';
$content = get_query_var( 'mv_card_content' ) ?: '';
?>

<article class="mission-vision-card" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"> 
	<?php if ( $image ) : ?>
		<div class="mission-vision-card__image-wrap">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="mission-vision-card__image" loading="lazy">
		</div>
	<?php endif; ?>
	<div class="mission-vision-card__body">
		<div class="mission-vision-card__body-inner">
			<?php if ( $title ) : ?>
				<h3 class="mission-vision-card__title"><?php echo esc_html( $title ); ?></h3>
			<?php endif; ?>
			<div class="desc">
				<?php if ( $content ) : ?>
					<p><?php echo esc_html( $content ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>
