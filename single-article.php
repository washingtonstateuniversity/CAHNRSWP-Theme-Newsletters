<?php
get_header();
get_template_part( 'parts/header','global' );
get_template_part( 'parts/loop', 'article' );
get_template_part( 'parts/footer','global' );
get_footer();
?>