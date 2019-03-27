<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="<?php bloginfo('charset'); ?>">
        <link rel="canonical" href="<?php echo get_site_url(); ?>">
        <meta name="Description" content="<?php   bloginfo('description'); ?>">
        <title><?php bloginfo('name'); ?>  <?php is_home() ? "|" . bloginfo('description') : wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
        <?php
        global $pars_touch_options;
        $pars_touch_options = get_option('pars_touch_options');
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
                    
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo  get_site_url(); ?>/wp-content/themes/pars/assets/images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="نمایش منو">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <?php
                    wp_nav_menu(array(
                        "container_class" => "collapse navbar-collapse",
                        'theme_location' => 'homepage',
                        "container_id" => 'navbarSupportedContent',
                        "container" => "div",
                        "menu_class" => "navbar-nav",
                        'walker' => new DPT_Bootstrap_Walker_Nav_Menu(),
                            )
                    );
                    ?>
                    
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
                            <img src="<?php echo  get_site_url(); ?>/wp-content/themes/pars/assets/images/home-header-particles.png" alt="Particles" />
                        </div>
                        <div class="header-obj ctx">
                            <img src="<?php echo  get_site_url(); ?>/wp-content/themes/pars/assets/images/home-header-context.png" alt="Parstouch Interactive Solutions" />
                        </div>
                        <div class="header-obj wall">
                            <img src="<?php echo  get_site_url(); ?>/wp-content/themes/pars/assets/images/home-header-wall.png" alt="Parstouch Video Wall" />
                        </div>
                        <div class="header-obj kiosk">
                            <img src="<?php echo  get_site_url(); ?>/wp-content/themes/pars/assets/images/home-header-kiosk.png" alt="Parstouch Kiosk" />
                        </div>
                        <div class="header-obj stand">
                            <img src="<?php echo  get_site_url(); ?>/wp-content/themes/pars/assets/images/home-header-stand.png" alt="Parstouch Stands" />
                        </div>
                    </div>

                </div>
            </div><!-- .container END -->
        </header><!-- End header section -->