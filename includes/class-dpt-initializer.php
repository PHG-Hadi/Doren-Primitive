<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class DPT_Initializer {

    function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'StyleScriptLoader'), 0);
        add_action('admin_enqueue_scripts', array($this, 'AdminStyleScriptLoader'), 0);
        add_action('widgets_init', array($this, 'FooterWidgets'));
        add_theme_support('sidebar');
        add_theme_support('menus');
        add_theme_support('post-thumbnails');
        add_action('init', array($this, 'PostTypes'), 0);
        add_theme_support('custom-background');
        add_action('after_setup_theme', array($this, 'RegisterNavBars'));
        add_action('admin_menu', array($this, 'Menus'));
        add_action('init', array($this, 'ShortCodes'));
        if (is_admin()) {
            add_action('load-post.php', array($this, 'MetaBoxes'));
            add_action('load-post-new.php', array($this, 'MetaBoxes'));
            add_action('plugins_loaded', array($this, 'FormHandlerInit'));
        }
        add_action('init',array($this,'InitFormHandlers'));
    }

    public function MetaBoxes() {
        new DPT_Product_Meta_Box();
    }

    public function StyleScriptLoader() {

        wp_enqueue_style("bootstrp", get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), null, 'all');
        wp_enqueue_style("font-awesome", get_template_directory_uri() . "/assets/css/font-awesome.min.css", array(), null, 'all');
        wp_enqueue_style("main", get_template_directory_uri() . "/assets/css/style.css", array(), null, 'all');
        wp_enqueue_script("jquery", get_template_directory_uri() . "/assets/js/jquery-3.3.1.min.js", array(), null, TRUE);
        wp_enqueue_script("bootstrap", get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), null, FALSE);
        wp_enqueue_script("main", get_template_directory_uri() . "/assets/js/main.js", array(), null, TRUE);
        wp_enqueue_script("popper", get_template_directory_uri() . "/assets/js/popper.min.js", array(), null, TRUE);
    }

    public function AdminStyleScriptLoader() {
        if (is_rtl()) {
            wp_enqueue_style("bootstrp", get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), null, 'all');
            wp_enqueue_script("bootstrap", get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), null, FALSE);
        } else {
            wp_enqueue_style("bootstrp", get_template_directory_uri() . "/assets/ltr/css/bootstrap.min.css", array(), null, 'all');
            wp_enqueue_script("bootstrap", get_template_directory_uri() . "/assets/ltr/js/bootstrap.min.js", array(), null, FALSE);
        }
        wp_enqueue_style("admin-style", get_template_directory_uri() . "/assets/css/admin-style.css", array(), null, 'all');
        wp_enqueue_style("font-awesome", get_template_directory_uri() . "/assets/css/font-awesome.min.css", array(), null, 'all');
        wp_enqueue_script("popper", get_template_directory_uri() . "/assets/js/popper.min.js", array(), null, TRUE);
    }

    public function FooterWidgets() {
        register_sidebar(
                array(
                    'name' => 'Logo Wraper',
                    'id' => 'logo_wraper',
                    'before_widget' => '<div class="col-md-6 col-lg-3">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h2>',
                )
        );
        register_sidebar(
                array(
                    'name' => 'Short Link',
                    'id' => 'short_link',
                    'before_widget' => '<div class="col-md-6 col-lg-2">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h2>',
                )
        );
        register_sidebar(
                array(
                    'name' => 'Short Link 2',
                    'id' => 'short_link_2',
                    'before_widget' => '<div class="col-md-6 col-lg-2">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h2>',
                )
        );
        register_sidebar(
                array(
                    'name' => 'Social Network',
                    'id' => 'social_network',
                    'before_widget' => '<div class="col-md-6 col-lg-2">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h2>',
                )
        );
        register_sidebar(
                array(
                    'name' => 'Newsletter',
                    'id' => 'newsletter',
                    'before_widget' => '<div class="col-md-6 col-lg-3">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h2>',
                )
        );
    }

    public function PostTypes() {
        $labels = array(
            'name' => 'محصولات',
            'singular_name' => 'محصولات',
            'menu_name' => 'محصولات',
            'name_admin_bar' => '',
            'add_new' => 'افزودن',
            'add_new_item' => 'محصول جدید',
            'new_item' => 'محصول جدید',
            'edit_item' => 'ویرایش',
            'view_item' => 'پیش نمایش',
            'all_items' => 'همه محصولات',
            'search_items' => 'جست و جوی محصول',
            'parent_item_colon' => '',
            'not_found' => 'محصولی پیدا نشد',
            'not_found_in_trash' => 'زباله دان خالی می باشد'
        );


        $args = array(
            'labels' => $labels,
            'description' => __('Description.', 'your-plugin-textdomain'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'product'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        );

        register_post_type('product', $args);
        $clabels = array(
            'name' => 'مشتریان',
            'singular_name' => 'مشتری',
            'menu_name' => 'مشتری',
            'name_admin_bar' => 'مشتری',
            'add_new' => 'افزودن',
            'add_new_item' => 'افزودن مشتری',
            'new_item' => 'افزودن',
            'edit_item' => 'ویرایش',
            'view_item' => 'پیش نمایش',
            'all_items' => 'همه ',
            'search_items' => 'جست و جوی ',
            'parent_item_colon' => '',
            'not_found' => 'مشتری پیدا نشد.',
            'not_found_in_trash' => 'زباله دان خالی می باشد'
        );


        $cargs = array(
            'labels' => $clabels,
            'description' => __('Description.', 'your-plugin-textdomain'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'customer'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        );

        register_post_type('customer', $cargs);
        $plabels = array(
            'name' => 'نمونه کارها',
            'singular_name' => 'نمونه کار',
            'menu_name' => 'نمونه کار',
            'name_admin_bar' => 'نمونه کار',
            'add_new' => 'افزودن',
            'add_new_item' => 'افزودن نمونه کار',
            'new_item' => 'افزودن',
            'edit_item' => 'ویرایش',
            'view_item' => 'پیش نمایش',
            'all_items' => 'همه ',
            'search_items' => 'جست و جوی ',
            'parent_item_colon' => '',
            'not_found' => 'نمونه کاری پیدا نشد',
            'not_found_in_trash' => 'زباله دان خالی می باشد'
        );


        $pargs = array(
            'labels' => $plabels,
            'description' => __('Description.', 'your-plugin-textdomain'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'portfolio'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'custom-fields',
                'revisions',
                'post-formats',
            ),
        );

        register_post_type('portfolio', $pargs);
    }

    function RegisterNavBars() {
        register_nav_menus(array(
            "homepage" => "صفحه اصلی"
                )
        );
    }

    function Menus() {
        $menu = new DPT_Menus();
        $menu->Menus();
        $menu->SubMenus();
    }

    function ShortCodes() {
        new DPT_Shortcodes();
    }

    function FormHandlerInit() {
        $forms = new DPT_From_Handlers();
        $forms->init();
    }

}
