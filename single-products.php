
<?php
get_header();
?>
<div>
    <?php
    $meta = get_post_meta(get_the_id(), 'product_meta')[0];
    $imgurls = $meta['gallery']['first'] . "," . $meta['gallery']['second'];
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
                <a class="nav-link" href="#product-introduction">معرفی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#product-facilities">امکانات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#product-uses">موارد استفاده</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#latest-portfolio-products">آخرین پروژه ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <?php
    }
    ?>
    <div class="row">
        <div id="product-introduction" class="col-sm-12 col-md-12">
            <h3>معرفی محصول</h3>
            <?php
            echo get_the_content();
            ?>
        </div>
        <div id="product-facilities" class="col-sm-12 col-md-12">
            <h3>امکانات</h3>
            <?php
            
            ?>
        </div>
        <div id="product-uses" class="col-sm-12 col-md-12">
            <h3>موارد استفاده</h3>
        </div>
        <div id="latest-portfolio-products" class="col-sm-12 col-md-12">
            <h3>آخرین پروژه ها از این محصول</h3>
            
        </div>
    </div>
        
    <?php
//    var_dump(get_post_meta(get_the_id(), 'product_meta')[0]);
    ?>
</div>
<?php get_footer(); ?>