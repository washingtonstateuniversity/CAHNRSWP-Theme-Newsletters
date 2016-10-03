var cwpnt_editor = function(){
	
	var self = this;
	
	this.bind_events = function(){
		
		if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			
			jQuery( '.cwpnt-editor' ).on( 'click' , '.cwpnt-insert-image .insert-image' , function( e ){
				e.preventDefault();
				self.insert_image( jQuery( this ) );
			})
			
		} // end if
		
	} // end bind_events
	
	this.insert_image = function( ic ) {
		
		var wrap = ic.closest('.cwpnt-insert-image');
		
		var id = wrap.find('input.insert-image-id');
		var src = wrap.find('input.insert-image-src');
		
		var img = wrap.find('.img-bg');
		
		wp.media.editor.send.attachment = function(props, attachment) {
						
			id.val(attachment.id);
			
			src.val(attachment.url);
			
			img.css( 'background-image', 'url(' + attachment.url + ')');
			
		};
		 
		wp.media.editor.open(wrap);
		  
		  return false;
		  
	  } // end open_media_window
	
} // end issue_editor

var cwpnt = new cwpnt_editor();
cwpnt.bind_events();