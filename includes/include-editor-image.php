<div id="cwpnt-editor<?php echo $editor_img_name;?>" class="cwpnt-editor">
	<div class="cwpnt-row sidebar-left-layout">
    	<h3><span><?php echo $editor_img_title;?></span></h3>
        <div class="cwpnt-column column-one">
            <div class="cwpnt-insert-image">
        		<div class="img-bg" style="background-image:url(<?php echo $img_src;?>);"></div>
            	<div class="cwpnt-field">
            		<a href="#" class="cwpnt-button insert-image">Select Image</a>
                	<input type="text" name="<?php echo $editor_img_name;?>_image_id" class="insert-image-id" /> 
            	</div>
            </div>
        </div>
        <div class="cwpnt-column column-two">
            <div class="cwpnt-field">
                <input type="text" name="<?php echo $editor_img_name;?>_title" value="" placeholder="Caption Title Here" />
            </div>
        	<div class="cwpnt-field">
                <textarea name="<?php echo $editor_img_name;?>_caption"  placeholder="Caption Goes Here"></textarea>
            </div>
            <div class="cwpnt-field">
                <input type="text" name="<?php echo $editor_img_name;?>_photo_credit" value="" placeholder="Photo Credit Here"/>
            </div>
        </div>
	</div>
</div>
