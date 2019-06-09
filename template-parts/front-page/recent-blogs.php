<!-- recent-blogs section -->
<?php $template_url = get_template_directory_uri(); ?>
<section class="recent-blogs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="color alter bold text-center">بلاگ پارس تاچ</h2>
                <h3 class="alter text-center">
                    از
                    <strong>فناوری های تعاملی</strong>
                    بیشتر بدانید
                </h3>
            </div>
            <div class="row blog-items">                
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 4, // Number of recent posts thumbnails to display
                        'post_status' => 'publish' 
                    ));
                    foreach($recent_posts as $post) : ?>
                    <div class="blog-item col-sm-3">                        
                        <a class="item-head" style="background-image:url(<?php echo get_the_post_thumbnail_url($post['ID']); ?>);" href="<?php echo get_permalink($post['ID']) ?>">                                   
                            <div class="item-date"><?php echo gregorian_to_jalali_converter(get_the_date( 'Y-m-d'), 'date');?></div>                                                         
                        </a>
                        <a class="item-title" href="<?php echo get_permalink($post['ID']) ?>">
                            <p class="item-caption"><?php echo $post['post_title'] ?></p>
                        </a>
                        <?php 
                            $post_tags = get_the_tags($post['ID']);
 
                            if ( $post_tags ) {
                        ?>
                        <a class="item-tags" href="<?php echo get_permalink($post['ID']) ?>"> 
                            <?php        
                                foreach( $post_tags as $tag ) {
                                    echo '<label class="label label-info">'.$tag->name . '</label>'; 
                                    }
                            ?> 
                        </a>
                            <?php  } ?>                        
                                </div>
                    <?php endforeach; wp_reset_query(); ?>                
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- end recent-blogs section -->