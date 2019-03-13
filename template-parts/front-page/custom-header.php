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