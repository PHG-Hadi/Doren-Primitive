<?php get_header(); ?>
<div class="container">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            global $wp_query;
            echo '<div class="row doren-product">'
            . '<div class=" col-sm-12 col-md-4 ">'
            . '<a href="'
            . get_the_permalink()
            . '" >'
            . get_the_post_thumbnail(get_the_ID(), array('auto', '256px'))
            . '</a></div>'
            . '<div class="col-sm-12 col-md-8 ">'
            . '<a href="'
            . get_the_permalink()
            . '" ><h1 class="color">'
            . get_the_title()
            . '</h1></a>'
            . '<p>'
            . mb_substr(get_the_excerpt(), 0, 400) . " ..."
            . '</p>'
            . '</div>'
            . '</div></a>';
        }
    }
    ?>
</div>

<?php get_footer(); ?>