<?php
get_header();
?>
<div class="search-overlay">
    <div class="container text-center position-relative">
        <form id="searchform" class="form-inline d-inline-block" role="search" method="get" action="<?php esc_url(home_url('/')) ?>">
            <button class="btn close-btn" type="button">
                <i class="fa fa-remove"></i>
            </button>
            <input id="s" name="s" class="search-form-control form-control" type="text" placeholder="جستجو ..." aria-label="Search">
            <button class="btn search-btn" type="submit" type="submit" id="searchsubmit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>


<?php get_template_part('template-parts/front-page/feature', 'section') ?>

<?php get_template_part('template-parts/front-page/why', 'use'); ?>

<?php get_template_part('template-parts/front-page/recent', 'blogs'); ?>

<?php get_template_part('template-parts/front-page/recent', 'customers'); ?>


<!--  creative comunication section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

            </div>

        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- end  creative comunication section -->

<!--  parallax area section -->
<section>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-7">
            </div>
            <div class="col-lg-5">

            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section>

<section>
    <div class="container">
        <div class="row no-gutters">

        </div><!-- .row END -->
    </div><!-- .container END -->
</section>
<?php get_footer(); ?>
