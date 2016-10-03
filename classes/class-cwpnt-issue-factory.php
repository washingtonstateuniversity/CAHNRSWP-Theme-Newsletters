<?php

class CWPNT_Issue_Factory extends CWPNT_Factory {
	
	
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
		
		require_once 'class-cwpnt-post-type.php';
		require_once 'class-cwpnt-issue.php';
			
		$issue = new CWPNT_Issue();
		
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