<div id="cwpnt-editor-images" class="cwpnt-editor">
	<div class="cwpnt-row half-layout">
    	<h3><span>Images</span></h3>
        <div class="cwpnt-column column-one">
        	<div class="cwpt-column-title req">Primary Image</div>
            <div class="cwpnt-insert-image">
                <div class="img-bg" style="background-image:url(<?php echo $primary_img_src;?>);"></div>
                <div class="cwpnt-field">
                    <a href="#" class="cwpnt-button insert-image">Select Image</a>
                    <input type="text" name="_primary_image_id" class="insert-image-id" /> 
                </div>
                <div class="cwpnt-field">
                <input type="text" name="_primary_image_title" value="" placeholder="Caption Title Here" />
            </div>
            <div class="cwpnt-field">
                <textarea name="_primary_image_caption"  placeholder="Caption Goes Here"></textarea>
            </div>
            <div class="cwpnt-field">
                <input type="text" name="_primary_image_photo_credit" value="" placeholder="Photo Credit Here"/>
            </div>
            </div>
        </div>
        <div class="cwpnt-column column-two">
        	<div class="cwpt-column-title req">Secondary(Captioned) Image</div>
            <div class="cwpnt-insert-image">
                <div class="img-bg" style="background-image:url(<?php echo $secondary_img_src;?>);"></div>
                <div class="cwpnt-field">
                    <a href="#" class="cwpnt-button insert-image">Select Image</a>
                    <input type="text" name="_secondary_image_id" class="insert-image-id" /> 
                </div>
                <div class="cwpnt-field">
                <input type="text" name="_secondary_image_title" value="" placeholder="Caption Title Here" />
            </div>
            <div class="cwpnt-field">
                <textarea name="_secondary_image_caption"  placeholder="Caption Goes Here"></textarea>
            </div>
            <div class="cwpnt-field">
                <input type="text" name="_secondary_image_photo_credit" value="" placeholder="Photo Credit Here"/>
            </div>
            </div>
        </div>
	</div>
</div>