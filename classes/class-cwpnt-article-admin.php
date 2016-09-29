<?php

class CWPNT_Article_Admin extends CWPNT_Article {
	
	
	public function do_action_edit_form_after_title( $post ){
		
		$html = $this->return_editor_summary( $post );
		
		echo $html;
		
	} // end do_edit_form_after_title
	
	
	public function return_editor_summary( $post ){
		
		return 'summary field';
		
	} // end return_editor_summary
	
	
} // end class