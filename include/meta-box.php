<?php
/**
 * Register wpbt testimonial meta box(es).
 */
function wpbt_testi_register_meta_boxes() {
    add_meta_box( 'wpbt-testi-box-id', __( 'Testimonial Information', 'wpbt' ), 'wpbt_testi_display_callback', 'testimonial' );
}
add_action( 'add_meta_boxes', 'wpbt_testi_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wpbt_testi_display_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
	
	
	$testi_degi = get_post_meta(get_the_ID(), 'testi_degi', true);
	$testi_date = get_post_meta(get_the_ID(), 'testi_date', true);
	$testi_month = get_post_meta(get_the_ID(), 'testi_month', true);
	$testi_more = get_post_meta(get_the_ID(), 'testi_more', true);
	$testi_rating = get_post_meta(get_the_ID(), 'testi_rating', true);
	
	echo '<label for="testi_degi" class="testi-data">Designation: </label>';
	echo '<input type="text" id="testi_degi" name="testi_degi" value="'.esc_attr($testi_degi).'" placeholder=" CEO " size="25" />';
	
	echo '<div class="wpbt-cler"></div>';
	echo '<label for="testi_date" class="testi-data">Date: </label>';
	echo '<input type="text" id="testi_date" name="testi_date" value="'.esc_attr($testi_date).'" placeholder=" 15 " size="25" />';
	
	echo '<div class="wpbt-cler"></div>';
	echo '<label for="testi_month" class="testi-data">Month: </label>';
	echo '<input type="text" id="testi_month" name="testi_month" value="'.esc_attr($testi_month).'" placeholder=" Jan " size="25" />';
	
	echo '<div class="wpbt-cler"></div>';
	echo '<label for="testi_more" class="testi-data">More Reviews: </label>';
	echo '<input type="text" id="testi_more" name="testi_more" value="'.esc_attr($testi_more).'" placeholder=" More Reviews " size="25" />';
	
	echo '<div class="wpbt-cler"></div>';
	echo '<label for="testi_rating" class="testi-data">Rating: </label>';
	echo '<input type="text" id="testi_rating" name="testi_rating" value="'.esc_attr($testi_rating).'" placeholder=" 5 " size="25" />';
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpbt_testi_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
	
	$sanitize_testi_degi = sanitize_text_field( $_POST['testi_degi']);
	$sanitize_testi_date = sanitize_text_field( $_POST['testi_date']);
	$sanitize_testi_month = sanitize_text_field( $_POST['testi_month']);
	$sanitize_testi_more = sanitize_text_field( $_POST['testi_more']);
	$sanitize_testi_rating = sanitize_text_field( $_POST['testi_rating']);
		
	update_post_meta( get_the_ID(), 'testi_degi',  $sanitize_testi_degi);
	update_post_meta( get_the_ID(), 'testi_date',  $sanitize_testi_date);
	update_post_meta( get_the_ID(), 'testi_month',  $sanitize_testi_month);	
	update_post_meta( get_the_ID(), 'testi_more',  $sanitize_testi_more);	
	update_post_meta( get_the_ID(), 'testi_rating',  $sanitize_testi_rating);	
	
}
add_action( 'save_post', 'wpbt_testi_save_meta_box' );
?>