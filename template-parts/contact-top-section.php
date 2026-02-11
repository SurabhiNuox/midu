<?php
/**
 * Contact top section — two columns: left (heading, contact info, social), right (form).
 * Data can be overridden via ACF on the Contact page: contact_heading, contact_intro,
 * contact_address, contact_phone, contact_email, contact_social_links (repeater: platform, url).
 */

$heading   = ( function_exists( 'get_field' ) && get_field( 'contact_heading' ) ) ? get_field( 'contact_heading' ) : __( 'Get in touch with us', 'midu' );
$intro     = ( function_exists( 'get_field' ) && get_field( 'contact_intro' ) ) ? get_field( 'contact_intro' ) : __( 'Questions, comments, or suggestions? Simply fill in the form and we\'ll be in touch shortly.', 'midu' );
$address   = ( function_exists( 'get_field' ) && get_field( 'contact_address' ) ) ? get_field( 'contact_address' ) : 'Khalid ibn El waleed St, Al Khalidiyah, City, Saudi Arabia';
$phone     = ( function_exists( 'get_field' ) && get_field( 'contact_phone' ) ) ? get_field( 'contact_phone' ) : '+961 123 456 789';
$email     = ( function_exists( 'get_field' ) && get_field( 'contact_email' ) ) ? get_field( 'contact_email' ) : 'info@midu.sa';

$social_links = array(
	array( 'platform' => 'linkedin', 'url' => '#', 'aria' => 'LinkedIn' ),
	array( 'platform' => 'twitter', 'url' => '#', 'aria' => 'Twitter/X' ),
	array( 'platform' => 'instagram', 'url' => '#', 'aria' => 'Instagram' ),
	array( 'platform' => 'youtube', 'url' => '#', 'aria' => 'YouTube' ),
);
if ( function_exists( 'get_field' ) && get_field( 'contact_social_links' ) ) {
	$acf_social = get_field( 'contact_social_links' );
	if ( is_array( $acf_social ) && ! empty( $acf_social ) ) {
		$social_links = array();
		foreach ( $acf_social as $row ) {
			$platform = isset( $row['platform'] ) ? $row['platform'] : 'linkedin';
			$url      = isset( $row['url'] ) ? $row['url'] : '#';
			$aria     = isset( $row['aria_label'] ) ? $row['aria_label'] : ucfirst( $platform );
			$social_links[] = array( 'platform' => $platform, 'url' => $url, 'aria' => $aria );
		}
	}
}

$icon_location = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>';
$icon_phone   = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>';
$icon_email   = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>';
?>

<div class="contact_top_section_inner d_flex_wrap">
	<div class="contact_top_section_left">
		<h2 class="contact_top_section_heading" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"><?php echo esc_html( $heading ); ?></h2>
		<p class="contact_top_section_intro" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true"><?php echo esc_html( $intro ); ?></p>
		<ul class="contact_top_section_list" aria-label="<?php esc_attr_e( 'Contact details', 'midu' ); ?>">
			<li class="contact_top_section_item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true">
				<span class="contact_top_section_icon" aria-hidden="true"><?php echo $icon_location; ?></span>
				<span class="contact_top_section_item_text"><?php echo esc_html( $address ); ?></span>
			</li>
			<li class="contact_top_section_item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="280" data-aos-once="true">
				<span class="contact_top_section_icon" aria-hidden="true"><?php echo $icon_phone; ?></span>
				<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" class="contact_top_section_item_text"><?php echo esc_html( $phone ); ?></a>
			</li>
			<li class="contact_top_section_item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="360" data-aos-once="true">
				<span class="contact_top_section_icon" aria-hidden="true"><?php echo $icon_email; ?></span>
				<a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact_top_section_item_text"><?php echo esc_html( $email ); ?></a>
			</li>
		</ul>
		<div class="contact_top_section_social" aria-label="<?php esc_attr_e( 'Social media', 'midu' ); ?>" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="440" data-aos-once="true">
			<?php
			$icon_map = array(
				'linkedin'   => 'icon-linkedin',
				'twitter'    => 'icon-twitter',
				'instagram'  => 'icon-Instagram',
				'youtube'    => 'icon-YouTube',
			);
			foreach ( $social_links as $s ) :
				$platform = strtolower( $s['platform'] );
				$icon_cls = isset( $icon_map[ $platform ] ) ? $icon_map[ $platform ] : 'icon-linkedin';
				?>
				<a href="<?php echo esc_url( $s['url'] ); ?>" class="contact_top_section_social_icon" aria-label="<?php echo esc_attr( $s['aria'] ); ?>" target="_blank" rel="noopener noreferrer">
					<span class="<?php echo esc_attr( $icon_cls ); ?>"></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="contact_top_section_right" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150" data-aos-once="true">
		<form class="contact_top_section_form" action="<?php echo esc_url( get_permalink() ); ?>" method="post" novalidate>
			<?php wp_nonce_field( 'contact_top_form', 'contact_top_nonce' ); ?>
			<div class="contact_top_section_form_row">
				<label for="contact_first_name" class="screen-reader-text"><?php esc_html_e( 'First Name', 'midu' ); ?></label>
				<input type="text" id="contact_first_name" name="contact_first_name" placeholder="<?php esc_attr_e( 'First Name*', 'midu' ); ?>" required>
				<label for="contact_last_name" class="screen-reader-text"><?php esc_html_e( 'Last Name', 'midu' ); ?></label>
				<input type="text" id="contact_last_name" name="contact_last_name" placeholder="<?php esc_attr_e( 'Last Name*', 'midu' ); ?>" required>
			</div>
			<div class="contact_top_section_form_row">
				<label for="contact_email" class="screen-reader-text"><?php esc_html_e( 'Email', 'midu' ); ?></label>
				<input type="email" id="contact_email" name="contact_email" placeholder="<?php esc_attr_e( 'Email*', 'midu' ); ?>" required>
			</div>
			<div class="contact_top_section_form_row">
				<label for="contact_phone" class="screen-reader-text"><?php esc_html_e( 'Phone Number', 'midu' ); ?></label>
				<input type="tel" id="contact_phone" name="contact_phone" placeholder="<?php esc_attr_e( 'Phone Number*', 'midu' ); ?>" required>
			</div>
			<div class="contact_top_section_form_row">
				<label for="contact_message" class="screen-reader-text"><?php esc_html_e( 'Message', 'midu' ); ?></label>
				<textarea id="contact_message" name="contact_message" rows="5" placeholder="<?php esc_attr_e( 'Message', 'midu' ); ?>"></textarea>
			</div>
			<div class="contact_top_section_form_row contact_top_section_form_submit">
				<button type="submit" class="btn-primary contact_top_submit_btn">
					<span class="button-text"><?php esc_html_e( 'Submit', 'midu' ); ?></span>
					<span class="button-icon"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow.svg' ); ?>" alt="" width="10" height="10" aria-hidden="true"></span>
				</button>
			</div>
		</form>
	</div>
</div>
