
<?php
get_header();
?>
<div>
    <?php
    $meta = get_post_meta(get_the_id(), 'product_meta');
    $imgurls = $meta[0]['gallery']['first'] . "," . $meta[0]['gallery']['second'];
    echo "<div class='row'>" . DPT_Shortcodes::OwlSlider(array(
        'urls' => $imgurls,
        'responsive_s' => 1,
        'responsive_m' => 1,
        'responsive_l' => 1,
            )
    )
    . "</div>";
    ?>
</div>
<div class="container">
    <?php
    while (have_posts()) {
        the_post();
        ?>
        <h1><?php echo get_the_title(); ?></h1>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">معرفی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">امکانات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">موارد استفاده</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">آخرین پروژه ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <?php
    }

//print_r(get_post_meta(get_the_id(), 'product_meta'))[0];
    ?>
</div>
<?php get_footer(); ?>