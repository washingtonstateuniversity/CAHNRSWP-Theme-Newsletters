<?php

class CWPNT_Article extends CWPNT_Post_type {
	
	protected $post_type = 'article';
	
	protected $post_type_args = array(
		'description'        => 'Description.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'article' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'taxonomies'         => array('post_tag'),
		'menu_position'      => null,
		'supports'           => array( 'title', 'author', 'editor' ),
	);
	
	protected $labels = array(
		'name'               => 'Articles',
		'singular_name'      => 'Article',
		'menu_name'          => 'Articles',
		'name_admin_bar'     => 'Article',
		'add_new'            => 'Add New', 'Article',
		'add_new_item'       => 'Add New Article',
		'new_item'           => 'New Article',
		'edit_item'          => 'Edit Article',
		'view_item'          => 'View Article',
		'all_items'          => 'All Articles', 
		'search_items'       => 'Search Articles',
		'parent_item_colon'  => 'Parent Articles:',
		'not_found'          => 'No Articles found.',
		'not_found_in_trash' => 'No Articles found in Trash.',
	);
	
	
	// Meta fields used in the post type | key => default value
	protected $meta_fields = array(
		'_subtitle'                      => '',
		'_featured_image_id'            => '',
		'_featured_image_src'            => '',
		'_featured_image_caption_title'  => '',
		'_featured_image_caption'        => '',
		'_featured_image_photo_credit'   => '',
		'_secondary_image_id'           => '',
		'_secondary_image_src'           => '',
		'_secondary_image_caption_title' => '',
		'_secondary_image_caption'       => '',
		'_secondary_image_photo_credit'  => '',
		'_secondary_image_src'           => '',
		'_contact_name'                  => '',
		'_contact_title'                 => '',
		'_contact_email'                 => '',
		'_contact_phone'                 => '',
	);
	
	// Set Priorities for a given action | action => priority
	protected $priorities = array(
		'edit_form_after_title'  => 1,
		'edit_form_after_editor' => 99,
	);
	
	
	public function the_edit_form_after_title( $post , $meta ){
		
		$subtitle = $this->get_meta_field( '_subtitle' );
		
		$featured_image_id = $this->get_meta_field( '_featured_image_id' );
		$featured_image_src = $this->get_meta_field( '_featured_image_src' );
		$featured_image_caption_title = $this->get_meta_field( '_featured_image_caption_title' );
		$featured_image_caption = $this->get_meta_field( '_featured_image_caption' );
		$featured_image_photo_credit = $this->get_meta_field( '_featured_image_photo_credit' );
		
		$secondary_image_id = $this->get_meta_field( '_secondary_image_id' );
		$secondary_image_src = $this->get_meta_field( '_secondary_image_src' );
		$secondary_image_caption_title = $this->get_meta_field( '_secondary_image_caption_title' );
		$secondary_image_caption = $this->get_meta_field( '_secondary_image_caption' );
		$secondary_image_photo_credit = $this->get_meta_field( '_secondary_image_photo_credit' );
		
		$featured_image = ( $featured_image_src ) ? $featured_image_src : get_stylesheet_directory_uri() . '/images/placeholder.png';
		$secondary_image = ( $secondary_image_src ) ? $secondary_image_src : get_stylesheet_directory_uri() . '/images/placeholder.png';
		
		$excerpt = $this->get_post_excerpt();
		
		ob_start();
		
		include get_stylesheet_directory() . '/includes/include-editor-subtitle.php';
		include get_stylesheet_directory() . '/includes/include-editor-primary-secondary-images.php';
		include get_stylesheet_directory() . '/includes/include-editor-excerpt.php';
		include get_stylesheet_directory() . '/includes/include-editor-editor-header.php';

		
		$html = ob_get_clean();
		
		echo $html;
		
	} // end do_edit_form_after_title
	
	
	public function action_save_post( $post_id , $post, $update ){
		
		if ( is_admin() && $this->return_do_save( $post_id , $post, $update ) ){
			
			$this->set_by_wp_post( $post , 'form' );
			
			$meta = $this->get_meta_data();
			
			foreach( $meta as $key => $value ){
				
				update_post_meta( $post_id , $key , $value );
				
			} // end foreach
			
			if ( ! empty( $meta['_featured_image_id'] ) ){
				
				set_post_thumbnail( $post_id, $meta['_featured_image_id'] );
				
			} // end if
			
		} // end if
		
	} // end action_save_post
	
	
	public function the_edit_form_after_editor( $post , $meta ){
		
		$contact_name = $this->get_meta_field( '_contact_name' );
		$contact_title = $this->get_meta_field( '_contact_title' );
		$contact_email = $this->get_meta_field( '_contact_email' );
		$contact_phone = $this->get_meta_field( '_contact_phone' );
		
		ob_start();
		
		include get_stylesheet_directory() . '/includes/include-editor-contact.php';
		include get_stylesheet_directory() . '/includes/include-editor-related.php';
		
		$html = ob_get_clean();
		
		echo $html;
		
	} // end do_action_edit_form_after_editor
	
	
	public function return_display_featured_image( $post_id = false ){
		
		$html = '';
		
		if ( ! $post_id ) $post_id = $this->get_id();
		
		if ( $this->do_set_featured_image() ){
			
			$image = $this->get_featured_image();
			
			ob_start();
			
			include( locate_template( 'includes/include-article-template-featured-image.php' ) );
			
			$html = ob_get_clean();
			
		} // end if
		
		return $html;
		
	} // end return_featured_image
	
	
	public function return_display_title( $tag = 'h1' ){
		
		$title = $this->get_title();
		
		ob_start();
			
		include( locate_template( 'includes/include-article-template-title.php' ) );
		
		$html = ob_get_clean();
		
		return $html;
		
	} // end return_title_display
	
	
	public function return_display_content(){
		
		$content = $this->get_content();
		
		ob_start();
			
		include( locate_template( 'includes/include-article-template-content.php' ) );
		
		$html = ob_get_clean();
		
		return $html;
		
	} //end return_display_content
	
	
	public function return_display_pagination(){
		
		$html = '';
		
		return $html;
		
	} // end return_display_pagination
	
	
	public function return_display_related(){
		
		$html = '';
		
		return $html;
		
	} // end return_display_related
	
	
	// Sanitizes meta fields - must have or post type won't save
	protected function return_clean_meta( $save_fields ){
		
		$clean = array();
		
		$text_fields = array( 
			'_subtitle',
			'_featured_image_id',
			'_featured_image_src',
			'_featured_image_caption_title',
			'_featured_image_caption',
			'_featured_image_photo_credit',
			'_secondary_image_id',
			'_secondary_image_src',
			'_secondary_image_caption_title',
			'_secondary_image_caption',
			'_secondary_image_photo_credit',
			'_secondary_image_src',
			'_contact_name',
			'_contact_title',
			'_contact_email',
			'_contact_phone',
		);

		
		foreach( $text_fields as $key ){
			
			if ( isset( $save_fields[ $key ] ) ) $clean[ $key ] = sanitize_text_field( $save_fields[ $key ] );
			
		} // end foreach
		
		return $clean;
		
	} // end return_clean_meta
	
} // end class