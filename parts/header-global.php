<?php $cwpnt = CAHNRSWP_Theme_Newsletter::get_instance();?>
<main><header id="global-header" class="layout-container">
	<nav class="primary">
    	<?php 
			wp_nav_menu( array( 'theme_location' => 'newsletter-menu', 'container_class' => 'menu-container primary-menu' ) ); 
			wp_nav_menu( array( 'theme_location' => 'newsletter-menu-extra', 'container_class' => 'menu-container secondary-menu' ) );
			?>
    </nav>
    <div class="banner-primary">
    	<a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/banner-primary-sample.jpg" /></a>
    </div>
    <div class="subtitle"><?php echo $cwpnt->site->return_subtitle();?>
    </div>
</header>