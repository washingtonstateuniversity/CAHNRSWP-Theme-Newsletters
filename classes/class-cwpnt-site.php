<?php

class CWPNT_Site {
	
	protected $theme_dir;
	protected $theme_url;
	
	
	public function get_theme_dir() { return $this->theme_dir; }
	public function get_theme_url() { return $this->theme_url; }
	
	
	public function set_theme_dir( $dir ) { $this->theme_dir = $dir; }
	public function set_theme_url( $url ) { $this->theme_url = $url; }
	
	
	public function __construct( $debug = false ){
		
		if ( $debug ){
			
			$this->do_errors();
			
		} // end if
		
		$this->set_theme_dir( get_stylesheet_directory() );
		$this->set_theme_url( get_stylesheet_directory_uri() );
		
	} // end __construct
	
	public function do_register_menus(){
		 
		 register_nav_menu('newsletter-menu' , 'Newsletter Menu');
		 register_nav_menu('newsletter-menu-extra' , 'Newsletter Menu Extra');
		 
	 } // end do_register_menus
	 
	 
	 public function do_errors(){
		 
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		 
	 } // end do_errors
	 
	 
	 public function return_subtitle( $make_link = true ){
		 
		 $txt = get_bloginfo( 'description' );
		 
		 $link = get_option( 'cwpnt_description_link' , false );
		 
		 if ( $make_link ){
			 
			 $txt = '<a href="#">' . $txt . '</a>';
			 
		 } // end if
		 
		 return $txt;
		 
	 } // end return_subtitle
	 
	
} // end class