<?php
// Must be inside a loop.
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

if ( has_post_thumbnail() ) { ?>
    <div class="banner simple single-project" style="background-image: url(<?=$featured_img_url; ?> );"></div>
<?php } ?>
    