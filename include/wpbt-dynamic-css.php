<?php
/** Best Slider Testimonial add dynamic css*/

function add_dynamic_css_wpbt() { ?>
	<style type="text/css" media="all">
		.owl-theme .owl-nav [class*="owl-"] {
		color: <?php $color_theme = get_option( 'color_theme' ); if (!empty($color_theme)){echo esc_attr($color_theme);} else{echo '#ff9700';} ?>;
		border: 1px solid <?php $color_theme = get_option( 'color_theme' ); if (!empty($color_theme)){echo esc_attr($color_theme);} else{echo '#ff9700';} ?>;
	}
	.owl-theme .owl-nav [class*="owl-"]:hover, .post-slider-cont:hover .post-cont {
		background: <?php $color_theme = get_option( 'color_theme' ); if (!empty($color_theme)){echo esc_attr($color_theme);} else{echo '#ff9700';} ?>;
	}
	.post-image .image-layer a:hover, .post-cont .review, .post-cont h4 {
		color: <?php $color_theme = get_option( 'color_theme' ); if (!empty($color_theme)){echo esc_attr($color_theme);} else{echo '#ff9700';} ?>;
	}
	.post-image .image-layer a {
		color: <?php $more_color = get_option( 'more_color' ); if (!empty($more_color)){echo esc_attr($more_color);} else{echo '#ffffff';} ?>;
	}
	.date-spa, .month-spa{
		color: <?php $dm_color = get_option( 'dm_color' ); if (!empty($dm_color)){echo esc_attr($dm_color);} else{echo '#ffffff';} ?>;
	}
	.date-spa{
		background: <?php $date_back = get_option( 'date_back' ); if (!empty($date_back)){echo esc_attr($date_back);} else{echo '#363636';} ?>;
	}
	.month-spa{
		background: <?php $month_back = get_option( 'month_back' ); if (!empty($month_back)){echo esc_attr($month_back);} else{echo '#252525';} ?>;
	}
	.post-image .image-layer {
		background: <?php $image_overlay = get_option( 'image_overlay' ); if (!empty($image_overlay)){echo esc_attr($image_overlay);} else{echo '#000000b3';} ?>;
	}
	.post-cont{
		background-color: <?php $post_back = get_option( 'post_back' ); if (!empty($post_back)){echo esc_attr($post_back);} else{echo '#363636';} ?>;
	}
	.post-cont h5{
	    color: <?php $desig_color = get_option( 'desig_color' ); if (!empty($desig_color)){echo esc_attr($desig_color);} else{echo '#ffffff';} ?>;
	}
	.post-cont p{
	    color: <?php $para_color = get_option( 'para_color' ); if (!empty($para_color)){echo esc_attr($para_color);} else{echo '#8c8c8c';} ?>;
	}
	</style>
<?php }
add_action( 'wp_head', 'add_dynamic_css_wpbt' );
?>