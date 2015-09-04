<?php
/**
 * Add menu page in WordPress admin
 */

/**
 * register sections and fields for plugin admin page
 *
 * @action admin_init
 */
function video_tut_admin_init() {
	register_setting( 'video-tut-group', 'video_tut_input_field' );
	add_settings_section(
		'video_tut_section',
		'Video Settings',
		'video_tut_section_callback',
		'video-tut'
	);
	add_settings_field(
		'video_tut_input_field',
		'Add Video Link',
		'video_tut_input_field_callback',
		'video-tut',
		'video_tut_section'
	);
}
add_action( 'admin_init', 'video_tut_admin_init');

/**
 * Callback for add_settings_section
 */
function video_tut_section_callback() {

}

/**
 * Callback for add_settings_field
 */
function video_tut_input_field_callback() {
	$options = get_option( 'video_tut_input_field' );

	echo '<input type="text" id="video_tut_input_field" name="video_tut_input_field" value="' . esc_attr( $options ) . '" placeholder="http://yourlink.com">';
}

/**
 * Create plugin admin page
 *
 * @return void
 *
 * @add_action admin_menu
 */
function video_tut_options_page() {
	add_menu_page(
		__( 'Video Link', 'video-tut' ),
		__( 'Video Link', 'video-tut' ),
		'edit_theme_options',
		'video-tut',
		'video_tut_options_page_callback',
		'dashicons-admin-links',
		3
	);
}
add_action( 'admin_menu', 'video_tut_options_page' );

/**
 * Callback for add_menu_page
 */
function video_tut_options_page_callback() {
?>

	<div class="wrap">
		
		<h2>Video Tut Settings</h2>

		<form method="post" action="options.php">
		
		<?php
			settings_fields( 'video-tut-group' );
			do_settings_sections( 'video-tut' );
			submit_button();
		?>

		</form>
	</div>

<?php
}