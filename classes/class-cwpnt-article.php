<?php

class CWPNT_Article extends CWPNT_Post_type {
	
	protected $slug = 'article';
	
	protected $args = array(
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

	
	
} // end class