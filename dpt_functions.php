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
                $pp .= " value: ".deca_shop_traverse_array($value);
            } else {
                $pp .= "value: " . $value;
            }
        }
    } else {
//        $pp .= 'value 2 : ' . $YY;
    }

    return $pp;
}