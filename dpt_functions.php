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
