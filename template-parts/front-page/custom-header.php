<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="<?php bloginfo('charset'); ?>">
        <link rel="canonical" href="<?php echo get_site_url(); ?>">
        <meta name="Description" content="<?php bloginfo('description'); ?>">
        <title><?php bloginfo('name'); ?>  <?php is_home() ? "|" . bloginfo('description') : wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <?php
        global $options;
        $options = get_option('dpt_theme_touch_options');
        ?>

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

                    <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                        <img src="<?php
                        if ($options['front']['DPFrontPageLogo']) {
                            echo $options['front']['DPFrontPageLogo'];
                        } else {
                            echo "#";
                        }
                        ?>" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="نمایش منو">
                        <i class="fa fa-bars"></i>
                    </button>


                    <?php
                    wp_nav_menu(array(
                        "container_class" => "collapse navbar-collapse",
                        'theme_location' => 'home-page-top',
                        "container_id" => 'navbarSupportedContent',
                        "container" => "div",
                        "menu_class" => "navbar-nav",
                        'walker' => new DPT_Bootstrap_Walker_Nav_Menu(),
                        'fallback_cb' => 'DPT_Bootstrap_Walker_Nav_Menu::fallback',
                            )
                    );
                    ?>

                </nav>

            </div><!-- .container END -->
        </header><!-- End header section -->
        <?php
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        print_r(get_option('dpt_theme_touch_options'));
        ?>