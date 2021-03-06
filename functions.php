<?php

class CAHNRSWP_Theme_Newsletter {
	
	public static $instance;
	
	public static $version = '0.0.1';
	
	public $issue_factory;
	
	public $article_factory;
	
	public $site;
	
	
	/**
	 * Get the current instance or set it an return
	 * @return object current instance
	 */
	 public static function get_instance(){
		 
		 if ( null == self::$instance ) {
			 
            self::$instance = new self;
			
			self::$instance->do_init();
			
        } // end if
 
        return self::$instance;
		 
	 } // end get_instance
	 
	 
	 private function do_init(){
		 
		 require_once 'classes/class-cwpnt-site.php';
		 $this->site = new CWPNT_Site( true );
		 $this->site->do_init();
		 
		 require_once 'classes/class-cwpnt-factory.php';
		 
		 require_once 'classes/class-cwpnt-issue-factory.php';
		 $this->issue_factory = new CWPNT_Issue_Factory();
		 $issue = $this->issue_factory->return_issue();
		 $issue->init();
		 
		 require_once 'classes/class-cwpnt-article-factory.php';
		 $this->article_factory = new CWPNT_Article_Factory();
		 $article = $this->article_factory->return_article();
		 $article->init(); 
		 
	 } // end do_init
	 
	 
	
}

$cahnrswp_theme_newsletter = CAHNRSWP_Theme_Newsletter::get_instance();