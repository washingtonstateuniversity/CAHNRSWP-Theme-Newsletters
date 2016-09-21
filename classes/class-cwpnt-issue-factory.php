<?php

class CWPNT_Issue_Factory {
	
	protected $theme_dir;
	protected $theme_url;
	
	
	public function get_theme_dir() { return $this->theme_dir; }
	public function get_theme_url() { return $this->theme_url; }
	
	
	public function set_theme_dir( $dir ) { $this->theme_dir = $dir; }
	public function set_theme_url( $url ) { $this->theme_url = $url; }
	
	
	public function __construct( $theme_dir = '' , $theme_url = '' ){
		
		$this->set_theme_dir( $theme_dir );
		$this->set_theme_url( $theme_url );
		
		require_once $this->theme_dir .'/classes/class-cwpnt-post-type.php';
		require_once $this->theme_dir .'/classes/class-cwpnt-issue.php';
		
		if ( is_admin() ){
			
			require_once $this->theme_dir .'/classes/class-cwpnt-issue-admin.php';
			
		} // end if
		
	} // end __construct
	
	
	public function return_current_issue(){
		
		$args = array(
			'posts_per_page' => 1,
			'status'         => 'publish',
		);
		
		$posts = $this->return_query_issues( $args );
		
		$issue = $this->return_issue();
		
		if ( $posts ){
			
			$issue->do_set_issue_by_wp_post( $posts[0] );
			
		} // end if
		
		return $issue;
		
	} // end return_current_issue
	
	
	public function return_issue(){
		
		if ( is_admin() ){
			
			$issue = new CWPNT_Issue_Admin( $this->theme_dir , $this->theme_url );
			
		} else {
			
			$issue = new CWPNT_Issue( $this->theme_dir , $this->theme_url );
			
		} // end if
		
		return $issue;
		
	} // return_admin_issue
	
	
	public function return_query_issues( $args ){
		
		$args['post_type'] = 'issue';
		
		$posts = array();
		
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ){
			
			while( $query->have_posts() ){
				
				$query->the_post();
				
				$posts[] = $query->post;
				
			} // end while
			
		} // end if
		
		wp_reset_postdata();
		
		return $posts;
		
	} // end return_query_issues
	
	
} // end class