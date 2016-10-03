<?php

require_once 'class-cwpnt-post-type.php';
require_once 'class-cwpnt-article.php';

class CWPNT_Article_Factory extends CWPNT_Factory {
	
	
	public function return_article(){
			
		$article = new CWPNT_Article();
		
		return $article;
		
	} // return_admin_issue
	
	
	public function return_article_by_wp_post( $post ){
		
		$article = $this->return_article();
		$article->do_set_by_wp_post( $post );
		
		return $article;
		
	} // end return_article_by_wp_post
	
	
	
} // end class