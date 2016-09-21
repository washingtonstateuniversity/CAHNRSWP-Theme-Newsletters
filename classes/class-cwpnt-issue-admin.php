<?php

class CWPNT_Issue_Admin extends CWPNT_Issue {
	
	
	public function do_init(){
		
		parent::do_init();
		
		add_action( 'admin_enqueue_scripts', array( $this , 'do_action_admin_enqueue_scripts' ) );
		
	} // end do_init
	
	
	public function do_action_edit_form_after_title( $post ){
		
		$html = $this->return_select_feature_area( $post );
		
		echo $html;
		
	} // end do_edit_form_after_title
	
	
	public function do_action_admin_enqueue_scripts( $hook ){
		
		if ( 'edit.php' != $hook && 'post.php' != $hook ) {
			
        	return;
			
    	} // end if
		
		//wp_enqueue_script('media-upload');
   	 	//wp_enqueue_script('thickbox');
		//wp_enqueue_style('thickbox');
		wp_enqueue_style( 'issue-editor' , $this->get_theme_url() . '/css/issue-editor.css' , array(), CAHNRSWP_Theme_Newsletter::$version );
		wp_enqueue_script( 'issue-editor' , $this->get_theme_url() . '/js/issue-editor.js', array(), CAHNRSWP_Theme_Newsletter::$version, true );
		
	} // end 
	
	
	public function return_select_feature_area( $post ){
		
		$img_src = $this->get_theme_url() . '/images/placeholder.png';
		$select_slides = '';
		
		ob_start();
		
		include $this->get_theme_dir() . '/inc/inc-issue-editor-featured-image.php';
		
		return ob_get_clean();
		
	} // end return_select_feature_area
	
} // end class