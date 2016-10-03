<?php

$cwpnt = CAHNRSWP_Theme_Newsletter::get_instance();

if ( have_posts() ){
	
	while( have_posts() ){
		
		the_post();
		
		$article = $cwpnt->article_factory->return_article_by_wp_post( $post );
		
		$html = $article->return_display_featured_image();
		
		$html .= $article->return_display_title();
		
		$html .= $article->return_display_content();
		
		$html .= $article->return_display_pagination();
		
		$html .= $article->return_display_related();
		
		echo $html;
		
	} // end while
	
} // end if