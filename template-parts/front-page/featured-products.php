<!-- featured-products section -->
<?php $template_url = get_template_directory_uri(); ?>
<section class="featured-products" style="padding-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo get_site_url(null, '/products');?>"><h1 class="color text-left">محصولات پارس تاچ</h1></a>
            </div>
            <div class="col-sm-12 product-items owl-carousel" style="direction:ltr;">                
                    <?php
                    
						$args = array(
							'post_type' => 'products',
							'posts_per_page' => 12,
							'post_status' => 'publish',
							'meta_query' => array(
								array(
									'key' => 'dpt_front_product',
									'value' => 'yes',
									'compare' => '='
								)
							)
						);
						
						$q = new WP_Query($args);
						
						if ($q->have_posts()):
							while ($q->have_posts()):
								$q->the_post();								 
                    ?>
                    <div class="product-item row"> 
						<div class="bg-text bg-top d-sm-none d-md-block">
							<?php echo get_the_title();?>
						</div>
						<div class="col-md-8 col-sm-12">
							<a class="item-title"  href="<?php echo get_the_permalink(); ?>">
								<h3 class="alter bold"><?php echo get_the_title(); ?></h3>
							</a>
							<p class="item-content">
								<?php echo get_the_excerpt(); ?>
							</p>							                 
						</div>
						<div class="col-md-4 col-sm-12 item-image text-center">
							<?php echo get_the_post_thumbnail(get_the_ID(), array('auto', '300px')); ?>
						</div>
                    </div>
                    <?php
						endwhile;
						endif;
					?>                
            </div>
        </div><!-- .row END -->
		<script>
				jQuery(function(){
					jQuery('.product-items').owlCarousel({
						loop:true,						
						responsiveClass:true,
						autoplay:true,
						autoplayTimeout:7000,
						items:1,
						nav:true,
						navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]						
					})
				})			
			</script>
    </div><!-- .container END -->
	<div class="skew-mask">
		<div class="skew-mask-layer"></div>
	</div>
</section><!-- end featured-products section -->