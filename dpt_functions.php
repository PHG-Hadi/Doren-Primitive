<?php

function dpt_input($args) {
    if (empty($args['value'])) {
        $value = '';
    } else {
        $value = $args['value'];
    }
    $data = '<div class="form-group">'
            . '<label for="%s">' . __("%s", "doren") . '</label>'
            . '<input class="form-control" id="%s" name="%s" value="%s">'
            . '</div>';
    printf($data, $args['id'], $args['label'], $args['label'], $args['name'], $value);
}

function deca_shop_traverse_array($YY) {
//    if (isset($pp)) {
//        
//    } else {
//        $pp = '';
//    }
    if (is_array($YY)) {
        foreach ($YY as $key => $value) {

            if (is_array($value)) {
                $pp .= "key: " . $key;
                $pp .= " value: " . deca_shop_traverse_array($value);
            } else {
                $pp .= "value: " . $value;
            }
        }
    } else {
//        $pp .= 'value 2 : ' . $YY;
    }

    return $pp;
}

/*
 * custom pagination with bootstrap .pagination class
 * source: http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/
 */

function bootstrap_pagination($echo = true) {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_next' => true,
        'prev_text' => __('<i class="fa fa-chevron-left" aria-hidden="true"></i>'),
        'next_text' => __('<i class="fa fa-chevron-right" aria-hidden="true"></i>'),
            )
    );

    if (is_array($pages)) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

        $pagination = '<ul class="pagination">';

        foreach ($pages as $page) {
            $pagination .= "<li>$page</li>";
        }

        $pagination .= '</ul>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }
}
