<?php
/**
 * Adds a wpbt plugin setting page page under a custom post type parent.
 */
function register_wpbt_setting_page() {
    add_submenu_page(
        'edit.php?post_type=testimonial',
        __( 'setting', 'wpbt' ),
        __( 'setting', 'wpbt' ),
        'manage_options',
        'wpbt-setting-page',
        'wpbt_setting_page'
    );
}
add_action('admin_menu', 'register_wpbt_setting_page');
/**
 * Display callback for the submenu page.
 */
function wpbt_setting_page() { 
    ?>
    <div class="wrap wpbt-wrap">
    	<div class="wpbt-main-body">
	        <h2><?php _e( 'Testimonial Setting', 'wpbt' ); ?></h2>
	        <form action="options.php" method="post">
	        <?php wp_nonce_field('update-options');?>
	        <label for="color_theme" ><?php echo esc_attr(__('Theme Color : ')); ?></label>
	        <input type="text" name="color_theme" value="<?php echo get_option( 'color_theme' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="image_overlay" ><?php echo esc_attr(__('Image Overlay : ')); ?></label>
	        <input type="text" name="image_overlay" value="<?php echo get_option( 'image_overlay' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="more_link" ><?php echo esc_attr(__('More Link Address : ')); ?></label>
	        <input type="text" name="more_link" value="<?php echo get_option( 'more_link' ); ?>" class="" />
	        <div class="wpbt-cler"></div>
	        <label for="more_color" ><?php echo esc_attr(__('More Link Color : ')); ?></label>
	        <input type="text" name="more_color" value="<?php echo get_option( 'more_color' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="dm_color" ><?php echo esc_attr(__('Date & Month Color : ')); ?></label>
	        <input type="text" name="dm_color" value="<?php echo get_option( 'dm_color' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="date_back" ><?php echo esc_attr(__('Date Background Color : ')); ?></label>
	        <input type="text" name="date_back" value="<?php echo get_option( 'date_back' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="month_back" ><?php echo esc_attr(__('Month Background Color : ')); ?></label>
	        <input type="text" name="month_back" value="<?php echo get_option( 'month_back' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="post_back" ><?php echo esc_attr(__('Post Bakground : ')); ?></label>
	        <input type="text" name="post_back" value="<?php echo get_option( 'post_back' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="desig_color" ><?php echo esc_attr(__('Designation Color : ')); ?></label>
	        <input type="text" name="desig_color" value="<?php echo get_option( 'desig_color' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="para_color" ><?php echo esc_attr(__('Paragraph Color : ')); ?></label>
	        <input type="text" name="para_color" value="<?php echo get_option( 'para_color' ); ?>" class="color-picker" />
	        <div class="wpbt-cler"></div>
	        <label for="wpbt_auto"><?php echo esc_attr(__('Auto Play:')); ?></label>
	        <select name="wpbt_auto" id="wpbt_auto">
	      	  <option value="true" <?php if( get_option('wpbt_auto') == 'true'){ echo 'selected="selected"'; } ?>>YES</option>
	          <option value="false" <?php if( get_option('wpbt_auto') == 'false'){ echo 'selected="selected"'; } ?>>NO</option>
	        </select>
	        <div class="wpbt-cler"></div>
	        <label for="wpbt_navi"><?php echo esc_attr(__('Display Navigation:')); ?></label>
	        <select name="wpbt_navi" id="wpbt_navi">
	      	  <option value="true" <?php if( get_option('wpbt_navi') == 'true'){ echo 'selected="selected"'; } ?>>YES</option>
	          <option value="false" <?php if( get_option('wpbt_navi') == 'false'){ echo 'selected="selected"'; } ?>>NO</option>
	        </select>
	        <div class="wpbt-cler"></div>
	        <input type="hidden" name="action" value="update">
	        <input type="hidden" name="page_options" value="color_theme,image_overlay,more_link,more_color,dm_color,date_back,month_back,post_back,desig_color,para_color,wpbt_auto,wpbt_navi" />
	        <input type="submit" name="submit" value="<?php _e( 'Save Changes', 'wpbt' ); ?>" class="button" />
	        <div class="wpbt-cler"></div>
	        <label for="para_color" ><?php echo esc_attr(__('Short Code : ')); ?></label>
	        <input type="text" name="" value="[BESTSLIDERTESTIMONIAL]" size="22" />
	        </form>
	    </div>
	    <div class="wpbt-sidebar">
	    	<h2><?php _e( 'About Devoloper', 'wpbt' ); ?></h2>
	    	<p>I'm SABBIR AHMED working as a web developer with professional experience</p>
	    	<h4>Contact Me:</h4>
	    	<a href="https://wa.me/+8801976196846" target="_blank" class="button">WhatsApp</a>
	    </div>
    </div>
    <?php
}

?>