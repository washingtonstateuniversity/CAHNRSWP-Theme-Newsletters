<?php

class CWPNT_Article_Factory extends CWPNT_Factory {
	
	
	public function return_article(){
		
		require_once $this->theme_dir .'/classes/class-cwpnt-post-type.php';
		require_once $this->theme_dir .'/classes/class-cwpnt-article.php';
		
		if ( is_admin() ){
			
			require_once $this->theme_dir .'/classes/class-cwpnt-article-admin.php';
			$article = new CWPNT_Article_Admin( $this->theme_dir , $this->theme_url );
			
		} else {
			
			$article = new CWPNT_Article( $this->theme_dir , $this->theme_url );
			
		} // end if
		
		return $article;
		
	} // return_admin_issue
	
	
	
} // end class