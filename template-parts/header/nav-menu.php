<nav class="navbar navbar-expand-lg navbar-dark">

    <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
<!--        <img src="<?php if ($options['front']['DPFrontPageLogo']) {
    echo $options['front']['DPFrontPageLogo'];
} else {
    echo "#";
} ?>" alt="Logo">-->
<img src="<?php echo get_site_url(); ?>/wp-content/themes/Doren-Primitive/assets/images/logo.png">
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