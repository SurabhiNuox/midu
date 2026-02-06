<?php
/**
 * Template part: Project card (single card in projects grid).
 *
 * Data: set_query_var( 'project_card_image', 'project_card_title', 'project_card_description', 'project_card_link', 'project_card_show_button' )
 *
 * @package midu
 */

$card_image        = get_query_var( 'project_card_image' ) ?: '';
$card_title        = get_query_var( 'project_card_title' ) ?: '';
$card_description = get_query_var( 'project_card_description' ) ?: '';
$card_link         = get_query_var( 'project_card_link' ) ?: '#';
$card_show_button  = get_query_var( 'project_card_show_button' ) ?: false;
?>

<article class="project-card">
	<a href="<?php echo esc_url( $card_link ); ?>" class="project-card__link">
		<div class="project-card__image-wrap">
			<?php if ( $card_image ) : ?>
				<img src="<?php echo esc_url( $card_image ); ?>" alt="<?php echo esc_attr( $card_title ); ?>" class="project-card__image" loading="lazy">
			<?php endif; ?>
			<div class="project-card__overlay"></div>
		</div>
		<div class="project-card__content">
			<?php if ( $card_title ) : ?>
				<h3 class="project-card__title"><?php echo esc_html( $card_title ); ?></h3>
			<?php endif; ?>
			<div class="project-card__content-bottom">
			<?php if ( $card_description ) : ?>
				<p><?php echo esc_html( $card_description ); ?></p>
			<?php endif; ?>
				<div class="btn-primary">
					<span class="button-text">Explore</span>
					<span class="button-icon">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow.svg'); ?>" alt="Arrow Right">
					</span>
				</div>
			</div>
		</div>
	</a>
</article>
