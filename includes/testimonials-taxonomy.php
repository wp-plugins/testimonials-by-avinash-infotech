<?php
// Create Commision Taxonomy
add_action( 'init', 'create_categories_taxonomie', 0 );
function create_categories_taxonomie() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'testimonials-by-avinash-infotech' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'testimonials-by-avinash-infotech' ),
		'search_items'      => __( 'Search Category', 'testimonials-by-avinash-infotech' ),
		'all_items'         => __( 'All Category', 'testimonials-by-avinash-infotech' ),
		'parent_item'       => __( 'Parent Category', 'testimonials-by-avinash-infotech' ),
		'parent_item_colon' => __( 'Parent Category:', 'testimonials-by-avinash-infotech' ),
		'edit_item'         => __( 'Edit Category', 'testimonials-by-avinash-infotech' ),
		'update_item'       => __( 'Update Category', 'testimonials-by-avinash-infotech' ),
		'add_new_item'      => __( 'Add New Category', 'testimonials-by-avinash-infotech' ),
		'new_item_name'     => __( 'New Genre Category', 'testimonials-by-avinash-infotech' ),
		'menu_name'         => __( 'Category', 'testimonials-by-avinash-infotech' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'testimonial_category' ),
	);

	register_taxonomy( 'testimonial_category', array( 'testimonial' ), $args );
}
?>