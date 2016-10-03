<?php

abstract class CWPNT_Post_type {
	
	protected $theme_dir;
	protected $theme_url;
	protected $slug;
	protected $labels;
	protected $args;
	protected $id = '';
	protected $title = '';
	protected $content = '';
	protected $excerpt = '';
	protected $link = '';
	protected $featured_image = array();
	
	
	public function get_theme_dir() { return $this->theme_dir; }
	public function get_theme_url() { return $this->theme_url; }
	public function get_slug(){ return $this->slug; }
	public function get_labels(){ return $this->labels; }
	public function get_args() { return $this->args; }
	public function get_id() { return $this->id; }
	public function get_title() { return $this->title; }
	public function get_content() { return $this->content; }
	public function get_excerpt() { return $this->excerpt; }
	public function get_link() { return $this->link; }
	public function get_featured_image() { return $this->featured_image; }
	
	
	public function set_theme_dir( $dir ) { $this->theme_dir = $dir; }
	public function set_theme_url( $url ) { $this->theme_url = $url; }
	public function set_id( $title ) { $this->title = $title; }
	public function set_title( $title ) { $this->title = $title; }
	public function set_content( $content ) { $this->content = $content; }
	public function set_excerpt( $excerpt ) { $this->excerpt = $excerpt; }
	public function set_link( $link ) { $this->link = $link; }
	public function set_featured_image( $img_array ) { $this->featured_image = $img_array; }
	
	
	public function __construct(){
		
		$this->set_theme_dir( get_stylesheet_directory() );
		$this->set_theme_url( get_stylesheet_directory_uri() );
		
	} // end __construct
	
	
	public function do_init(){
		
		add_action( 'init' , array( $this , 'do_register' ) );
		
		if ( is_admin() ){
		
			if ( method_exists( $this , 'do_action_edit_form_after_title' ) ){
				
				add_action( 'edit_form_after_title' , array( $this , 'action_edit_form_after_title' ) , 10 );
				
			} // end if
			
			if ( method_exists( $this , 'do_action_admin_enqueue_scripts' ) ) {
				
				add_action( 'admin_enqueue_scripts', array( $this , 'do_action_admin_enqueue_scripts' ) , 10 );
				
			} // end if;
			
			if ( method_exists( $this , 'do_action_edit_form_after_editor' ) ){
				
				add_action( 'edit_form_after_editor' , array( $this , 'action_edit_form_after_editor' ) , 10 );
				
			} // end if
		
		}
		
	} // end do_init
	
	
	public function action_edit_form_after_title( $post ){
		
		if ( $this->get_slug() == $post->post_type ){
			
			$this->do_action_edit_form_after_title( $post );
			
		} // end if
		
	} // end action_edit_form_after_title
	
	
	public function action_edit_form_after_editor( $post ){
		
		if ( $this->get_slug() == $post->post_type ){
			
			$this->do_action_edit_form_after_editor( $post );
			
		} // end if
		
	} // end action_edit_form_after_title
	
	
	public function do_set_by_wp_post( $post ){
		
		if ( is_numeric( $post ) ) $post = get_post( $post );
		
		$this->set_id( $post->ID );
		$this->set_title( $post->post_title );
		$this->set_content( $post->post_content );
		$this->set_excerpt( $post->post_excerpt );
		$this->set_link( get_post_permalink( $this->get_id() ) );
		
	} // end do_set_issue_by_wp_post
	
	
	public function do_set_featured_image( $size = 'large' , $post_id = false ){
		
		if ( ! $post_id ) $post_id = $this->get_id();
		
		if ( has_post_thumbnail( $post_id ) ){
			
			$thumb_id = get_post_thumbnail_id( $post_id );
			$image = wp_get_attachment_image_src( $thumb_id , $size );
			
			$img_array = array(
				'src'           => $image[0],
				'id'            => $thumb_id,
				'caption_title' => get_post_meta( $post_id , '_featured_image_caption_title' , true ),
				'caption'       => get_post_meta( $post_id , '_featured_image_caption' , true ),
				'photo_credit'  => get_post_meta( $post_id , '_featured_image_photo_credit' , true ),
			);
		
			$this->set_featured_image( $img_array );
			
			return true;
			
		} // end if
		
		return false;
		
	} // end do_set_featured_image
	
	
	public function do_register(){
		
		$args = $this->get_args();
		$args['labels'] = $this->get_labels();
		
		register_post_type( $this->get_slug() , $args );
		
	} // end do_register
	
} // end class