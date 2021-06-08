<?php
add_action('admin_head', 'my_custom_admin_css');
function my_custom_admin_css() { ?>
<style type="text/css">
    tr[data-name="imageWidth"],
    tr[data-name="imagewidth_mobile"],
    tr[data-name="gridrow"],
    tr[data-name="pagelink"] {display:none;}
    
    .acf-field-gallery[data-name="projects"] tr[data-name="caption"],
    .acf-field-gallery[data-name="projects"] tr[data-name="alt"],
    .acf-field-gallery[data-name="projects"] tr[data-name="description"],
    .acf-field-gallery[data-name="projects"] .media-types.media-types-required-info {
        display: none;
    }
    .acf-field-gallery[data-name="projects"] tr[data-name="imagewidth_mobile"],
    .acf-field-gallery[data-name="projects"] tr[data-name="imageWidth"],
    .acf-field-gallery[data-name="projects"] tr[data-name="gridrow"],
    .acf-field-gallery[data-name="projects"] tr[data-name="pagelink"]{
        display: table-row;
    }
</style>
<?php }