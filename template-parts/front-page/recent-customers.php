<!-- recent-customers section -->
<section class="recent-customers">
    <div class="container">
		<div class="customer-items owl-carousel">                
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 18, // Number of recent posts thumbnails to display
                        'post_status' => 'publish' ,
						'post_type'   => array('customer')
                    ));
                    foreach($recent_posts as $post) : ?>
                    <div class="customer-item">                        
                        <a class="item-head" style="background-image:url(<?php echo get_the_post_thumbnail_url($post['ID']); ?>);" href="<?php echo get_permalink($post['ID']) ?>">                                                               
                        </a>
					</div>
                    <?php endforeach; wp_reset_query(); ?>                
            </div>
			
			<script>
				jQuery(function(){
					jQuery('.customer-items').owlCarousel({
						loop:true,
						margin:10,
						responsiveClass:true,
						autoplay:true,
						autoplayTimeout:5000,
						responsive:{
							0:{
								items:1,
								nav:false
							},
							600:{
								items:3,
								nav:false
							},
							1000:{
								items:5,
								nav:false,
								loop:true
							}
						}
					})
				})			
			</script>
    </div><!-- .container END -->
</section><!-- end recent-customers section -->