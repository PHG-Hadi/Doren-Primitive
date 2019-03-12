<?php

class DPT_Initializer {

    function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'StyleScriptLoader'));
        add_action('widgets_init', array($this, 'FooterWidgets'));
        add_theme_support('sidebar');
        add_theme_support('menus');
        add_action('init', array($this, 'PostTypes'), 0);
        add_theme_support( 'custom-background' );
    }

    public function FrontPageHeader() {
        ?>
        <!DOCTYPE html>
        <html class="no-js" <?php language_attributes(); ?>>
            <head>
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta charset="<?php bloginfo('charset'); ?>">
                <title><?php bloginfo('name'); ?>  <?php is_home() ? "|" . bloginfo('description') : wp_title(''); ?></title>
                <?php wp_head(); ?>
            </head>

            <body <?php body_class(); ?>>
                <!--[if lt IE 10]>
                            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
                    <![endif]-->

                <!-- prelaoder -->
                <!-- <div id="preloader">
                <div class="preloader-wrapper">
                    <div class="spinner"></div>
                </div>
                <div class="preloader-cancel-btn">
                    <a href="#" class="btn btn-secondary prelaoder-btn">Cancel Preloader</a>
                </div>
                </div> -->
                <!-- END prelaoder -->
                <!-- header section -->
                <header class="xs-header">
                    <div class="container position-relative">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <a class="navbar-brand" href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="نمایش منو">
                                <i class="fa fa-bars"></i>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">صفحه اصلی</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            محصولات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">محصول 1</a>
                                            <a class="dropdown-item" href="#">محصول 2</a>
                                            <a class="dropdown-item" href="#">محصول 3</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">مقالات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">گالری</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">درباره ما</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">ارتباط با ما</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">اخبار</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">دریافت نمایندگی</a>
                                    </li>
                                    <li class="nav-item search-nav-item">
                                        <a class="nav-link">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="row">
                            <div class="col-lg-6 co-sm-12 home-header-content">
                                <h2 class="text-white">به روز ترین راهکارهای تعاملی و لمسی</h2>
                                <p class="text-white text-justify pr-md-5">
                                    طیف وسیع راهکارهای تعاملی پارس تاچ، با تکیه بر آخرین فناوری های روز دنیا، آماده‌ی استفاده در
                                    کسب وکار شما هستند.محصولات لمسی کارآمد و بادوام ما، در اشکال و ابعاد متنوع، و متناسب با نیاز
                                    شما طراحی و تولید می‌شوند.
                                </p>
                                <div class="text-left">
                                    <div class="big-blue-btn">
                                        <i class="fa fa-question"></i>
                                        <span>استعلام</span>
                                    </div>
                                </div>
                                <br />
                                <br />
                            </div>

                            <div class="col-lg-6 co-sm-12 home-header-objects d-none d-md-block">
                                <div class="header-obj particles">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-header-particles.png" alt="Particles" />
                                </div>
                                <div class="header-obj ctx">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-header-context.png" alt="Parstouch Interactive Solutions" />
                                </div>
                                <div class="header-obj wall">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-header-wall.png" alt="Parstouch Video Wall" />
                                </div>
                                <div class="header-obj kiosk">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-header-kiosk.png" alt="Parstouch Kiosk" />
                                </div>
                                <div class="header-obj stand">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-header-stand.png" alt="Parstouch Stands" />
                                </div>
                            </div>

                        </div>
                    </div><!-- .container END -->
                </header><!-- End header section -->
                <?php
            }

            public function StyleScriptLoader() {
                wp_enqueue_style("bootstrp", get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), null, 'all');
                wp_enqueue_style("font-awesome", get_template_directory_uri() . "/assets/css/font-awesome.min.css", array(), null, 'all');
                wp_enqueue_style("typography", get_template_directory_uri() . "/assets/css/typography.css", array(), null, 'all');
                wp_enqueue_style("main", get_template_directory_uri() . "/assets/css/style.css", array(), null, 'all');
                wp_enqueue_script("jquery", get_template_directory_uri() . "/assets/js/jquery-3.3.1.min.js", array(), null, TRUE);
                wp_enqueue_script("bootstrap", get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), null, TRUE);
                wp_enqueue_script("main", get_template_directory_uri() . "/assets/js/main.js", array(), null, TRUE);
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
                    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
                );

                register_post_type('portfolio', $pargs);
            }

        }
        