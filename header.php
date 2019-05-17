<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="<?php bloginfo('charset'); ?>">
        <link rel="canonical" href="<?php echo get_site_url(); ?>">
        <link rel="alternate" hreflang="fa" href="<?php echo get_site_url(); ?>">
        <meta name="Description" content="<?php bloginfo('description'); ?>">
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
                <?php get_template_part("template-parts/header/nav", "menu") ?>
                <?php
                if (is_home() || is_front_page()) {
                    get_template_part("template-parts/front-page/top-content", "slider");
                }
                ?>
            </div><!-- .container END -->
        </header><!-- End header section -->

        <?php
        get_template_part("/template-parts/front-page/search", "overlay");
        ?>