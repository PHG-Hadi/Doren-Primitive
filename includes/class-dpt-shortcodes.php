<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class DPT_Shortcodes {

    function __construct() {
        add_shortcode('dpt-search', array($this, 'DPT_SEARCH'));
//        add_shortcode('dpt-owl', array($this, 'OwlSlider'));
    }

    function DPT_SEARCH() {
        $data = '<a class = "nav-link">'
                . '<i class = "fa fa-search"></i>'
                . '</a>';
        return $data;
    }

    static function OwlSlider($atts) {
        extract(shortcode_atts(array(
            'loop' => true,
            'nav' => true,
            'margin' => true,
                        ), $atts, 'dpt-owl'));
        $allowed = array('Ids', 'urls', 'count', 'width', 'height', 'post');

        $count = 2;
        $width = '100%';
        $height = '360px';
        $type = "";
        $post = 'single';
        $images = array();
        if (!empty($atts)) {
            foreach ($atts as $k => $v) {
                if (empty($v) || !isset($v)) {
                    return;
                }
                if (in_array($k, $allowed)) {
                    switch ($k) {

                        case "urls":
                            $type = "url";
                            $urls = explode(",", $v);
                            $images = $urls;
                            break;
                        case "Ids":
                            $type = "Id";
                            $Ids = explode(",", $v);
                            $images = $Ids;
                            break;
                        case "count":
                            $count = $v;
                            break;
                        case "width":
                            $width = $v;
                            break;
                        case "height":
                            $height = $v;
                        case "post":
                            $post = $v;
                            break;
                    }
                }
            }
        }


        $return = "";
        $posttype = get_post_type();
        $element_id = uniqid('doren_carousel_');
        $return = '<div id="' . $element_id . '" class="owl-carousel owl-theme doren_carousel_' . $posttype . '" style="height:' . $height . ';width:' . $width . '; direction:ltr;">';
        // The Loop
        if (!empty($type)) {

            foreach ($images as $ik => $iv) {

                $default_image = get_template_directory_uri() . "/assets/images/no-imgs.png";
                $post_id = get_the_ID();

                if ($type == 'Id') {
                    $return .= "<div class='slide-product-container'>"
                            . "<a href='" . get_the_permalink($post_id) . "'>" . wp_get_attachment_image($iv) . "</a>";
                    if ($post == 'archive')
                        $return .= "<a href='" . get_the_permalink($post_id) . "'><p class='slide-product-name'>" . get_the_title($post_id) . "</p></a>";

                    $return .= "</div>";
                }
                if ($type == 'url') {

                    $return .= "<div class='slide-product-container'>"
                            . "<a href='" . get_the_permalink($post_id) . "'><img class='slide-product-img' src='" . $iv . "' data-id='" . $post_id . "'></a>";
                    if ($post == 'archive')
                        $return .= "<a href='" . get_the_permalink($post_id) . "'><p class='slide-product-name'>" . get_the_title($post_id) . "</p></a>";

                    $return .= "</div>";
                }
            }

            //    $return .= '<div class="item" data-id="' . $post_id . '"><a href="' . get_the_permalink() . '"><img src="' . esc_url($image_url) . '"/><h4>' . $title . '</h4></a>' . $content . '</div>';
        } else {
            $return .= "<div class='slide-" . $posttype . "-container'>"
                    . "<a href='#'><img class='slide-" . $posttype . "-img' src='" . $default_image . "' data-id='" . $post_id . "'></a>"
                    . "<a href='" . get_the_permalink($post_id) . "'><p class='slide-" . $posttype . "-name'>" . get_the_title($post_id) . "</p></a>"
                    . "</div>";
        }



        $return .= '</div><script>jQuery(function(){jQuery("#' . $element_id . '"). owlCarousel({loop:true,margin:10,nav:false,autoplay:true,lazyLoad:true,dots:false,responsive:{0:{items:' . $atts['responsive_s'] . '},600:{items:' . $atts['responsive_m'] . '},1000:{items:' . $atts['responsive_l'] . '}}})})</script>';


        //    $return .= '</div><script>jQuery(function(){jQuery("#'.$element_id.'").owlCarousel({loop:true,margin:10,nav:true,responsive:{0:{items:1},600:{items:3},1000:{items:5}}})})</script>';





        echo $return;
    }

}
