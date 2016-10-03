<div id="cwpnt-editor-images" class="cwpnt-editor">
	<div class="cwpnt-row half-layout">
    	<h3><span>Images</span></h3>
        <div class="cwpnt-column column-one">
        	<div class="cwpt-column-title req">Primary Image</div>
            <div class="cwpnt-insert-image">
                <div class="img-bg" style="background-image:url(<?php echo $featured_image;?>);"></div>
                <div class="cwpnt-field">
                    <a href="#" class="cwpnt-button insert-image">Select Image</a>
                    <input type="hidden" name="_featured_image_id" class="insert-image-id" value="<?php echo $featured_image_id;?>" />
                    <input type="hidden" name="_featured_image_src" class="insert-image-src" value="<?php echo $featured_image_src;?>" /> 
                </div>
                <div class="cwpnt-field">
                <input type="text" name="_featured_image_caption_title" value="<?php echo $featured_image_caption_title;?>" placeholder="Caption Title Here" />
            </div>
            <div class="cwpnt-field">
                <textarea name="_featured_image_caption"  placeholder="Caption Goes Here"><?php echo $featured_image_caption;?></textarea>
            </div>
            <div class="cwpnt-field">
                <input type="text" name="_featured_image_photo_credit" value="<?php echo $featured_image_photo_credit;?>" placeholder="Photo Credit Here"/>
            </div>
            </div>
        </div>
        <div class="cwpnt-column column-two">
        	<div class="cwpt-column-title req">Secondary(Captioned) Image</div>
            <div class="cwpnt-insert-image">
                <div class="img-bg" style="background-image:url(<?php echo $secondary_image;?>);"></div>
                <div class="cwpnt-field">
                    <a href="#" class="cwpnt-button insert-image">Select Image</a>
                    <input type="hidden" name="_secondary_image_id" class="insert-image-id" value="<?php echo $secondary_image_id;?>" />
                    <input type="hidden" name="_secondary_image_src" class="insert-image-src"  value="<?php echo $secondary_image_src;?>" /> 
                </div>
                <div class="cwpnt-field">
                <input type="text" name="_secondary_image_caption_title" value="<?php echo $secondary_image_caption_title;?>" placeholder="Caption Title Here" />
            </div>
            <div class="cwpnt-field">
                <textarea name="_secondary_image_caption"  placeholder="Caption Goes Here"><?php echo $secondary_image_caption;?></textarea>
            </div>
            <div class="cwpnt-field">
                <input type="text" name="_secondary_image_photo_credit" value="<?php echo $secondary_image_photo_credit;?>" placeholder="Photo Credit Here"/>
            </div>
            </div>
        </div>
	</div>
</div>