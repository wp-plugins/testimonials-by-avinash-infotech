<?php



	add_action( 'init', 'testimonials_post_type' );
	
	function testimonials_post_type() {
		$labels = array(
			'name'               => _x( 'Testimonials', 'post type general name', 'testimonials-by-avinash-infotech' ),
			'singular_name'      => _x( 'Testimonial', 'post type singular name', 'testimonials-by-avinash-infotech' ),
			'menu_name'          => _x( 'Testimonials', 'admin menu', 'testimonials-by-avinash-infotech' ),
			'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar', 'testimonials-by-avinash-infotech' ),
			'add_new'            => _x( 'Add Testimonial', 'testimonial', 'testimonials-by-avinash-infotech' ),
			'add_new_item'       => __( 'Add New Testimonial', 'testimonials-by-avinash-infotech' ),
			'new_item'           => __( 'New Testimonial', 'testimonials-by-avinash-infotech' ),
			'edit_item'          => __( 'Edit Testimonial', 'testimonials-by-avinash-infotech' ),
			'view_item'          => __( 'View Testimonial', 'testimonials-by-avinash-infotech' ),
			'all_items'          => __( 'All Testimonials', 'testimonials-by-avinash-infotech' ),
			'search_items'       => __( 'Search Testimonials', 'testimonials-by-avinash-infotech' ),
			'parent_item_colon'  => __( 'Parent Testimonials:', 'testimonials-by-avinash-infotech' ),
			'not_found'          => __( 'No testimonials found.', 'testimonials-by-avinash-infotech' ),
			'not_found_in_trash' => __( 'No testimonials found in Trash.', 'testimonials-by-avinash-infotech' )
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
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports' => array( 'title', 'author' ,'editor', 'thumbnail', 'page-attributes' ),
			'menu_icon' 		 => 'dashicons-admin-post'
		);

		register_post_type( 'testimonial', $args );
	}
	
	
	/**
	 * Customise the "Enter title here" text.
	 *
	 * @access public
	 * @since  1.0.0
	 * @param string $title
	 * @return void
	 */
	 
	function enter_title_here( $title ) {
		if (get_post_type()=='testimonial') {
			$custom_title = __( 'Enter customer\'s name', 'testimonials-by-avinash-infotech' );
			$title = $custom_title;
		}
		return $title;
	}
	add_filter( 'enter_title_here', 'enter_title_here' );
	
	
	
	// Add the Meta Boxes
	function meta_box_setup () {
		add_meta_box( 'testimonial-data', __( 'Testimonial Details', 'testimonials-by-avinash-infotech' ), 'meta_box_content', 'testimonial', 'normal', 'high' );
	}
	add_action( 'add_meta_boxes', 'meta_box_setup' );
	
	/**
	 * Outputs the content of the meta box
	 */
	function meta_box_content( $post ) {
		global $post_id;
		$fields = get_post_custom( $post_id );
		$field_data = get_testimonial_data_settings();
		
		$html = '';
	
		$html .= '<input type="hidden" name="testimonial_nonce" id="testimonial_nonce" value="' . wp_create_nonce( basename( __FILE__ ), 'testimonial_nonce' ) . '" />';
	
		if ( 0 < count( $field_data ) ) {
				$html .= '<table class="form-table">' . "\n";
				$html .= '<tbody>' . "\n";
				
				foreach ( $field_data as $k => $v ) {
					$data = $v['default'];
					
					if ( isset( $fields[$k] ) && isset( $fields[$k][0] ) ) {
						$data = $fields[$k][0];
					}
					
					$html .= '<tr valign="top"><th scope="row"><label for="' . esc_attr( $k ) . '">' . $v['name'] . '</label></th><td><input name="' . esc_attr( $k ) . '" type="'.$v['type'].'" id="' . esc_attr( $k ) . '" class="regular-text" value="' . esc_attr( $data ) . '" />' . "\n";
					$html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
					$html .= '</td><tr/>' . "\n";
				}
	
				$html .= '</tbody>' . "\n";
				$html .= '</table>' . "\n";
		}
	
		echo $html;
	
	}
	
	/**
	 * Saves the custom meta input
	 */
	function meta_box_save( $post_id ) {
	 
		// Checks save status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'testimonial_nonce' ] ) && wp_verify_nonce( $_POST[ 'testimonial_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	 
		// Exits script depending on save status
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}
	 
		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'gravatar_email' ] ) ) {
			update_post_meta( $post_id, 'gravatar_email', sanitize_text_field( $_POST[ 'gravatar_email' ] ) );
		}
		
		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'byline' ] ) ) {
			update_post_meta( $post_id, 'byline', sanitize_text_field( $_POST[ 'byline' ] ) );
		}
		
		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'url' ] ) ) {
			update_post_meta( $post_id, 'url', sanitize_text_field( $_POST[ 'url' ] ) );
		}
		
	}
	add_action( 'save_post', 'meta_box_save' );
	
	
	
	
	
	/**
	 * Get the settings for the custom fields.
	 * @since  1.0.0
	 * @return array
	 */
	function get_testimonial_data_settings () {
		$fields = array();

		$fields['gravatar_email'] = array(
		    'name' => __( 'Gravatar E-mail Address', 'testimonials-by-avinash-infotech' ),
		    'description' => sprintf( __( 'Enter in an e-mail address, to use a %sGravatar%s, instead of using the "Featured Image".', 'testimonials-by-avinash-infotech' ), '<a href="' . esc_url( 'http://gravatar.com/' ) . '" target="_blank">', '</a>' ),
		    'type' => 'email',
		    'default' => '',
		    'section' => 'info'
		);

		$fields['byline'] = array(
		    'name' => __( 'Byline', 'testimonials-by-avinash-infotech' ),
		    'description' => __( 'Enter a byline for the customer giving this testimonial (for example: "CEO of Organization").', 'testimonials-by-avinash-infotech' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		$fields['url'] = array(
		    'name' => __( 'URL', 'testimonials-by-avinash-infotech' ),
		    'description' => __( 'Enter a URL that applies to this customer (for example: http://www.avinashinfotech.com/).', 'testimonials-by-avinash-infotech' ),
		    'type' => 'url',
		    'default' => '',
		    'section' => 'info'
		);

		return $fields;
	} // End get_custom_fields_settings()
	

?>