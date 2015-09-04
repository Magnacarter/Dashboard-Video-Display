<?php
/*
Plugin Name: Dashboard Video Tutorial Plugin
Plugin URI:  https://github.com/Magnacarter/Dashboard-Video-Display
Description: Shows a video tut in the dashboard of WordPress admin
Version:     1.0.0
Author:      Adam Carter
Author URI:  http://adamkristopher.com
License:     GPLv2+
*/

include( plugin_dir_path( __FILE__ ) . 'includes/admin.php');

// Function that outputs the contents of the dashboard widget
function dashboard_widget_function( $post, $callback_args ) { 

	$video_url = get_option( 'video_tut_input_field' );

	if ( $video_url != '' ) : ?>
	
	<iframe src="<?php echo esc_url( $video_url ) ?>" height="350" width="490" frameborder="0" allowfullscreen></iframe>

	<?php else : ?>

	<a href="<?php echo esc_url( admin_url() ) ?>admin.php?page=video-tut"><p>Please add a link to your video</p></a>

	<?php endif;
}

// Function used in the action hook
function add_dashboard_video_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'Video Tutorial', 'dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'add_dashboard_video_widgets' );

