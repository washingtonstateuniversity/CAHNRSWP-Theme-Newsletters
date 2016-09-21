// JavaScript Document

var media_loader = {
	
	load_media: function(){
				
		if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			
			jQuery('body').on('click', '.add-media-action', function(event) {
				
				event.preventDefault();
				
				var wrap = jQuery(this).closest( '.cwp-add-media-wrap');
				
				var id = wrap.find('.cpb-add-media-id');
				
				var img_src = wrap.find('.cpb-add-media-src');
				
				var img = wrap.find('.cpb-add-media-img');
				
				wp.media.editor.send.attachment = function(props, attachment) {
					
					id.val(attachment.id);
					
					console.log( attachment );
					
					img_src.val(attachment.url);
					
					img.html( '<img src="' + attachment.url + '" />' );
					
				};
				
				wp.media.editor.open(wrap);
				
				return false;
				
			}); // end on click
			
		} // end if
		
	}, // end media_loader
	
}

var cwpnt_editor = function(){
	
	var self = this;
	
	this.bind_events = function(){
		
		jQuery( '.cwpnt-editor' ).on( 'click' , '.cwpnt-insert-image .insert-image' , function( e ){ 
			e.preventDefault();
			media_loader.load_media() } 
		);
		
	} // end bind_events
	
	this.open_media_window = function() {
		
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		
		  /*if ( this.window === undefined ) {
			  
			   this.window = wp.media({
					  title: 'Insert a media',
					  library: {type: 'image'},
					  multiple: false,
					  button: {text: 'Insert'}
				  });
	  
			  var self = this; // Needed to retrieve our variable in the anonymous function below 
			  
			  this.window.on('select', function() {
					  var first = self.window.state().get('selection').first().toJSON();
					  wp.media.editor.insert('[myshortcode id="' + first.id + '"]');
				  });
				  
		  } // end if
	  
		  this.window.open();*/
		  
		  return false;
		  
	  } // end open_media_window
	
} // end issue_editor

var cwpnt = new cwpnt_editor();
cwpnt.bind_events();