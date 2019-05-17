<?php get_header(); ?>
<div class="container">
    <div class="row">
        <header class="container text-left">
            <?php
            // if this was a search we display a page header with the results count. If there were no results we display the search form.
            if (is_search()) :
                /* translators: %s: search result string */
                echo "<h1 class='search-head'>" . sprintf(esc_html__('Search Results for: %s', 'futurio'), get_search_query()) . "</h1>";

            endif;
            ?>
        </header><!-- .archive-page-header -->

        <?php
        if (have_posts()) :

            while (have_posts()) : the_post();

                get_template_part('template-parts/content/form', 'content');


            endwhile;

            the_posts_pagination();

        else :

            get_template_part('template-parts/content/form', 'content-none');

        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>