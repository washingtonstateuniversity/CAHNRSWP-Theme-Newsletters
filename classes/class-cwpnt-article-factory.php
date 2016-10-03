<?php

class CWPNT_Article_Factory extends CWPNT_Factory {
	
	
	public function return_article(){
		
		require_once 'class-cwpnt-post-type.php';
		require_once 'class-cwpnt-article.php';
			
		$article = new CWPNT_Article();
		
		return $article;
		
	} // return_admin_issue
	
	
	
} // end class