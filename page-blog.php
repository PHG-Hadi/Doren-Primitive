<?php

get_header();
$args = array(
    'post_status' => 'publish',
);
$q = new WP_Query($args);
if ($q->have_posts()):
    while ($q->have_posts()):
        $q->the_post();
        echo get_the_permalink() . get_the_post_thumbnail(get_the_ID(), array('300px', '300px')) . get_the_title();
    endwhile;
else:
    get_template_part();
endif;
bootstrap_pagination();
get_footer();
?>