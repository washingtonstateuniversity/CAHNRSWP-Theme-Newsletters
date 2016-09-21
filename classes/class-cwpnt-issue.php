<?php

class CWPNT_Issue extends CWPNT_Post_type {
	
	protected $slug = 'issue';
	
	protected $args = array(
		'description'        => 'Description.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'issue' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'author', 'excerpt' ),
	);
	
	protected $labels = array(
		'name'               => 'Issues',
		'singular_name'      => 'Issue',
		'menu_name'          => 'Issues',
		'name_admin_bar'     => 'Issue',
		'add_new'            => 'Add New', 'Issue',
		'add_new_item'       => 'Add New Issue',
		'new_item'           => 'New Issue',
		'edit_item'          => 'Edit Issue',
		'view_item'          => 'View Issue',
		'all_items'          => 'All Issues', 
		'search_items'       => 'Search Issues',
		'parent_item_colon'  => 'Parent Issues:',
		'not_found'          => 'No Issues found.',
		'not_found_in_trash' => 'No Issues found in Trash.',
	);

	
	public function do_init(){
		
		parent::do_init();
		
	} // end do_init
	
	
	public function do_set_issue_by_wp_post( $post ){
		
		$this->do_set_by_wp_post( $post );
		
	} // end do_set_issue_by_wp_post
	
	
	public function return_feature_area( $spineless = false ){
	} // return_feature_image
	
	
	public function return_primary_features( $spineless = false ){
	} // return_primary_features
	
	
	public function return_secondary_features( $spineless = false ){
	} // return_secondary_features
	
	
} // end class