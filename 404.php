<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>

<div id="content" class="container">
    <div class="row">
        <div class="col-12 col-xl-12 col-lg-12 col-md-12 clo-sm-12">
            
            <header>
                <h1 class="page-title">صفحه مورد نظر شما موجود نمی باشد.</h1>
            </header>

            <div class="page-wrapper">
                <div class="page-content">
                    <h2><?php _e('This is somewhat embarrassing, isn’t it?', 'twentythirteen'); ?></h2>
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen'); ?></p>

                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </div><!-- .page-wrapper -->

        </div><!-- #content -->
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>