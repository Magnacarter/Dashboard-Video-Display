<?php
/**
 * Custom Post Type: Testimonial
 */
function akc_testimonial() {
	$labels = array(
		'name'               => 'testimonial',
		'singular_name'      => 'testimonial',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New testimonial',
		'edit_item'          => 'Edit testimonial',
		'new_item'           => 'New testimonial',
		'all_items'          => 'All testimonial',
		'view_item'          => 'View testimonial',
		'search_items'       => 'Search testimonial',
		'not_found'          => 'No event found',
		'not_found_in_trash' => 'No event found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonial',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'taxonomies'         => array( 'category' ),
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array( 'title', 'editor', 'thumbnail', )
	);

register_post_type( 'testimonial', $args );
}
add_action( 'init', 'akc_testimonial' );