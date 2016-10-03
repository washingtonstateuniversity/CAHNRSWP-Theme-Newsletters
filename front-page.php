<?php
$cwpnt = CAHNRSWP_Theme_Newsletter::get_instance();
$issue = $cwpnt->issue_factory->return_current_issue();

get_header();
get_template_part( 'parts/header','global' );

$issue->return_feature_area( true );
$issue->return_primary_features( true );
$issue->return_secondary_features( true );
get_template_part( 'parts/footer','global' );
get_footer();
?>