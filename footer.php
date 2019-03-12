<!-- footer section start -->
    <footer class="footer-section">
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <?php
                    if ( is_active_sidebar( 'logo_wraper' ) ) :
                        dynamic_sidebar( 'logo_wraper' );
                    endif;
                    if ( is_active_sidebar( 'short_link' ) ) :
                        dynamic_sidebar( 'short_link' );
                    endif;
                    if ( is_active_sidebar( 'short_link_2' ) ) :
                        dynamic_sidebar( 'short_link_2' );
                    endif;
                    if ( is_active_sidebar( 'social_network' ) ) :
                        dynamic_sidebar( 'social_network' );
                    endif;
                    if ( is_active_sidebar( 'newsletter' ) ) :
                        dynamic_sidebar( 'newsletter' );
                    endif;
                    ?>
                </div><!-- .row END -->
            </div><!-- .container END -->
        </div><!-- .footer-top-area END -->
    </footer>
    <!-- footer section end -->
    <!-- js file start -->
<?php wp_footer(); ?>
</body>

</html>