<?php

/* * ************************** WP_QUERY For Product on home page ************************ */

$args = array(
    'post_type' => 'products',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => 'dpt_front_product',
            'value' => 'yes',
            'compare' => '='
        )
    )
);

$q = new WP_Query($args);

if ($q->have_posts()):
    while ($q->have_posts()):
        $q->the_post();
        echo get_the_permalink() . get_the_post_thumbnail(get_the_ID(), array('300px', '300px')) . get_the_title();
    endwhile;
    else:
        /* some code */
endif;

