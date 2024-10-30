<?php
/**
 * Plugin Name:       Best Slider Testimonial
 * Plugin URI:        https://developer.wordpress.org/plugins/best-slider-testimonial
 * Description:       best slider testimonial is a wordpress plugin to display your client review or testimonial in your wordpress website.
 * Version:           1.0
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            SABBIR AHMED
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpbt
 */


/**
 * wpbt enqueue scripts and styles
 */
function wpbt_scripts() {
	wp_enqueue_style( 'all.min', plugins_url( 'css/all.min.css', __FILE__ ) );
	wp_enqueue_style( 'owl.carousel', plugins_url( 'css/owl.carousel.min.css', __FILE__ ) );
	wp_enqueue_style( 'owl.theme', plugins_url( 'css/owl.theme.default.min', __FILE__ ) );
	wp_enqueue_style( 'wpbt-style', plugins_url( 'css/wpbt-style.css', __FILE__ ) );
	wp_enqueue_script( 'owl.carousel', plugins_url( 'js/owl.carousel.min.js', __FILE__ ), array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpbt_scripts' );

/**
 * Enqueue a custom stylesheet in the wpbt admin.
 */
function wpbt_enqueue_admin_style() {
        wp_enqueue_style( 'wpbt-admin-style', plugins_url( 'css/wpbt-admin-style.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
	wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
}
add_action( 'admin_enqueue_scripts', 'wpbt_enqueue_admin_style' );

/**
 * wpbt Custom Post
 */

if ( ! function_exists('wpbt_custom_post_type') ) {

// Register Custom Post Type
function wpbt_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'wpbt' ),
		'singular_name'         => _x( 'Testimonial Type', 'Post Type Singular Name', 'wpbt' ),
		'menu_name'             => __( 'Testimonial', 'wpbt' ),
		'name_admin_bar'        => __( 'Post Type', 'wpbt' ),
		'archives'              => __( 'Item Archives', 'wpbt' ),
		'attributes'            => __( 'Item Attributes', 'wpbt' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wpbt' ),
		'all_items'             => __( 'All Items', 'wpbt' ),
		'add_new_item'          => __( 'Add New Item', 'wpbt' ),
		'add_new'               => __( 'Add New', 'wpbt' ),
		'new_item'              => __( 'New Item', 'wpbt' ),
		'edit_item'             => __( 'Edit Item', 'wpbt' ),
		'update_item'           => __( 'Update Item', 'wpbt' ),
		'view_item'             => __( 'View Item', 'wpbt' ),
		'view_items'            => __( 'View Items', 'wpbt' ),
		'search_items'          => __( 'Search Item', 'wpbt' ),
		'not_found'             => __( 'Not found', 'wpbt' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wpbt' ),
		'featured_image'        => __( 'Featured Image', 'wpbt' ),
		'set_featured_image'    => __( 'Set featured image', 'wpbt' ),
		'remove_featured_image' => __( 'Remove featured image', 'wpbt' ),
		'use_featured_image'    => __( 'Use as featured image', 'wpbt' ),
		'insert_into_item'      => __( 'Insert into item', 'wpbt' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpbt' ),
		'items_list'            => __( 'Items list', 'wpbt' ),
		'items_list_navigation' => __( 'Items list navigation', 'wpbt' ),
		'filter_items_list'     => __( 'Filter items list', 'wpbt' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial Type', 'wpbt' ),
		'description'           => __( 'Testimonial Description', 'wpbt' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'wpbt_custom_post_type', 0 );

}

/**
 * wpbt post loop
 */

function wpbt_testimonial_loop(){
	?>
		<div class="post-slider owl-carousel owl-theme">
	<?php
	// WP_Query arguments
	$args = array(
		'post_type'              => array( 'testimonial' ),
		'post_status'            => array( 'publish' ),
		//'post_per_page'          => 10
	);

	// The Query
	$wpbt_query = new WP_Query( $args );

	// The Loop
	if ( $wpbt_query->have_posts() ) {
		while ( $wpbt_query->have_posts() ) {
			$wpbt_query->the_post();
			// do something
			?>
              <div class="post-slider-cont">
                <div class="post-image">
                  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="driving lesson near me, driving lesson, driving school, driving school near me, driving instructor near me, best, local, instructor, london, manual lesson near me, automatic lesson near me, kabsdrivingschool, kabs, driving license">
                  <div class="image-layer">
                    <a href="<?php echo esc_attr(get_option( 'more_link' ) ); ?>" target="_blank"><?php echo esc_attr(get_post_meta( get_the_ID(), 'testi_more', true  ) ); ?></a>
                    <!--<a href="https://g.page/kabs_driving?share" target="_blank"><?php //echo get_post_meta( get_the_ID(), 'testi_more', true  ); ?></a>-->
                  </div>
                </div>
                <div class="post-date">
                  <div class="date-spa"><span><?php echo get_post_meta( get_the_ID(), 'testi_date', true  ); ?></span></div>
                  <div class="month-spa"><span><?php echo get_post_meta( get_the_ID(), 'testi_month', true ); ?></span></div>                
                </div>
                <div class="post-cont">
                  <div class="review">
                  <?php
                  $wpbt_client_review = get_post_meta( get_the_ID(), 'testi_rating', true  );
                  if($wpbt_client_review==1){
                  	echo "<span class='fa fa-star'></span>";
                  }elseif ($wpbt_client_review==2){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span>";
                  }elseif ($wpbt_client_review==3){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
                  }elseif ($wpbt_client_review==4){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
                  }elseif ($wpbt_client_review==5){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
                  }elseif ($wpbt_client_review==1.5){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star-half'></span>";
                  }elseif ($wpbt_client_review==2.5){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star-half'></span>";
                  }elseif ($wpbt_client_review==3.5){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star-half'></span>";
                  }elseif ($wpbt_client_review==4.5){
                  	echo "<span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star-half'></span>";
                  }else{
                  	echo "No Rating :(";
                  }                  
                  ?>
                  </div>
                  <h4><?php the_title(); ?></h4>
                  <h5><?php echo get_post_meta( get_the_ID(), 'testi_degi', true ); ?></h5>
                  <p><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                  <a href="<?php echo get_permalink( get_the_ID() ); ?>">Read More</a>
                </div>
              </div>
	<?php		
		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();
	?>
	</div>
<?php
}


/**
  Remove auto paragraph
 */	
remove_filter('the_excerpt', 'wpautop');


/**
wpbt add shortcode
*/
function wpbt_custom_shortcode() {
	add_shortcode( 'BESTSLIDERTESTIMONIAL', 'wpbt_testimonial_loop' );
}
add_action( 'init', 'wpbt_custom_shortcode' );


/**
	wpbt testimonial jQuary Settings.
**/
function wpbt_testimoni(){?>
<script>
	jQuery(document).ready(function($){
	    jQuery(".post-slider").owlCarousel({
	       loop:true,
		    margin:20,
		    autoplay:<?php echo esc_attr(get_option('wpbt_auto') );?>,
		    nav:<?php echo esc_attr(get_option('wpbt_navi') );?>,
		    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		    dots:false,
		    responsive:{
		        280:{
		            items:1
		        },
		        550:{
		            items:2
		        },
		        992:{
		            items:3
		        }
		    } 
		});
	});
</script>
<?php }
add_action('wp_footer', 'wpbt_testimoni', 9999);


/**
redirect to wpbt plugin setting page
*/
register_activation_hook( __FILE__, 'wpbt_plugin_activate' );
add_action( 'admin_init', 'wpbt_plugin_redirect' );
function wpbt_plugin_activate() {
  add_option( 'wpbt_plugin_do_activation_redirect', true );
}
function wpbt_plugin_redirect(){
if (get_option('wpbt_plugin_do_activation_redirect', false)){
delete_option('wpbt_plugin_do_activation_redirect');
if(!isset($_GET['active-multi']))
{
wp_redirect("edit.php?post_type=testimonial&page=wpbt-setting-page");
}
}
}

/**
get all php file
*/
foreach ( glob( plugin_dir_path( __FILE__ ) . "include/*.php" ) as $file )
    include_once $file;



?>