<?php

abstract class CWPNT_Factory {
	
	protected $theme_dir;
	protected $theme_url;
	
	
	public function get_theme_dir() { return $this->theme_dir; }
	public function get_theme_url() { return $this->theme_url; }
	
	
	public function set_theme_dir( $dir ) { $this->theme_dir = $dir; }
	public function set_theme_url( $url ) { $this->theme_url = $url; }
	
	
	public function __construct( $theme_dir = '' , $theme_url = '' ){
		
		$this->set_theme_dir( $theme_dir );
		$this->set_theme_url( $theme_url );
		
	} // end __construct
	
	
} // end class