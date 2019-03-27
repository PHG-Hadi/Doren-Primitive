<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
class DPT_Shortcodes {

    function __construct() {
        add_shortcode('dpt-search', array($this, 'DPT_SEARCH'));
    }

    function DPT_SEARCH() {
        $data = '<a class = "nav-link">'
                . '<i class = "fa fa-search"></i>'
                . '</a>';
        return $data;
    }

}
