<?php

class DPT_Product_Meta_Box {

    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'AddMetaBox'));
        add_action('save_post', array($this, 'Save'));
    }

    /**
     * Adds the meta box container.
     */
    public function AddMetaBox($post_type) {
        // Limit meta box to certain post types.
        $post_types = array('products');

        if (in_array($post_type, $post_types)) {
            add_meta_box(
                    'product_meta_box', 'اطلاعات تکمیلی', array($this, 'RenderProductMetaBox'), $post_type, 'advanced', 'high'
            );
        }
        if (in_array($post_type, array('portfolio'))) {
            add_meta_box(
                    'portfolio_meta_box', __('All Products', 'dpt'), array($this, 'RenderPortfolioMetaBox'), $post_type, 'advanced', 'high'
            );
        }
    }

    public function RenderPortfolioMetaBox($post) {
        wp_nonce_field('portfolio_post_type_form', 'portfolio_post_type_form_nonce');
        $args = array(
            'post_type' => 'products',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );
        $q = new WP_Query($args);
        $args = array(
            'post_type' => 'customer',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $c_q = new WP_Query($args);
        $post_id = get_the_ID();
        $p_meta = get_post_meta($post_id, 'dpt_info')[0];

        $array = array();
        if (!empty($p_meta['product_list'])) {
            $array = explode(',', $p_meta['product_list']);
        }
        //        print_r($p_meta[0]['product_list']);
        if ($q->have_posts()) {
            $form = "";

            while ($q->have_posts()) {
                $q->the_post();
                if (in_array(get_the_ID(), $array)) {
                    $ch = 'checked=""';
                } else {
                    $ch = "";
                }
                $form .= '<div class="form-check-inline">'
                        . '<label class="form-check-label" for="product-check-box-' . get_the_ID() . '">'
                        . '<input ' . $ch . ' type="checkbox" name="portfolio_product_list[]" id="product-check-box-' . get_the_ID() . '" class="form-check-input" value="' . get_the_ID() . '">' . get_the_title()
                        . '</label>'
                        . '</div>';
            }
            echo $form;
        }

        if ($c_q->have_posts()) {
            echo '<br /><br />'
            . '<div class="form-group">'
            . '<label for="dpt-portfolio-customer">انتخاب مشتری برای نمونه کار</label>'
            . '<select class="form-control" id="dpt-portfolio-customer" name="dpt_portfolio_customer">'
            . '<option value="">یک مشتری را انتخاب نمایید.</option>';
            while ($c_q->have_posts()) {
                $c_q->the_post();
                if (get_the_ID() == $p_meta['customer_id']) {
                    echo '<option value="' . get_the_ID() . '" selected="">' . get_the_title() . '</option>';
                } else {
                    echo '<option value="' . get_the_ID() . '" >' . get_the_title() . '</option>';
                }
            }
            '</div>';
        }
        ?>
        <script>
            jQuery(document).ready(function () {
                var $ = jQuery;
                if ($('.set_custom_images').length > 0) {
                    if (typeof wp !== 'undefined' && wp.media && wp.media.editor) {
                        var custom_uploader;
                        $('.set_custom_images').click(function (e) {
                            e.preventDefault();
                            //If the uploader object has already been created, reopen the dialog
                            if (custom_uploader) {
                                custom_uploader.open();
                                return;
                            }
                            //Extend the wp.media object
                            custom_uploader = wp.media.frames.file_frame = wp.media({
                                title: 'انتخاب تصاویر این نمونه کار',
                                button: {
                                    text: 'انتخاب'
                                },
                                multiple: true
                            });
                            custom_uploader.on('select', function () {
                                var selection = custom_uploader.state().get('selection');
                                var ids = [];
                                selection.map(function (attachment) {
                                    ids.push(attachment.id);
                                    attachment = attachment.toJSON();
                                    $(".portfolio-gallery").append("<div class='col-sm-5' ><img style='width:100%; height:auto;max-height:356px;' src=" + attachment.url + "></div>");
                                    $("#dpt-portfolio-gallery").val(ids.join(","));
                                });
                            });
                            custom_uploader.open();
                        });
                    }
                }
            });
        </script>
        <div class="form-group">
            <label for="dpt-portfolio-gallery">گالری نمونه کار</label>
            <input type="hidden" value="<?php ?>" class="regular-text process_custom_images form-control" id="dpt-portfolio-gallery" name="dpt_portfolio_gallery"> <!--max="" min="1" step="1"-->
            <button class="set_custom_images button btn-btn-primary">انتخاب عکس ها</button>
        </div>
        <div class="row portfolio-gallery">
            <?php
            echo $this->RenderPortfolioGallery($post_id);
            ?>
        </div>
        <?php
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function Save($post_id) {
        global $post;
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
        switch (get_post_type()) {
            case "products":

                // Check if our nonce is set.
                if (!isset($_POST['product_post_type_form_nonce'])) {
                    return $post_id;
                }

                $nonce = $_POST['product_post_type_form_nonce'];

                // Verify that the nonce is valid.
                if (!wp_verify_nonce($nonce, 'product_post_type_form')) {
                    return $post_id;
                }

                /*
                 * If this is an autosave, our form has not been submitted,
                 * so we don't want to do anything.
                 */
                if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                    return $post_id;
                }

                // Check the user's permissions.
                if ('products' == $_POST['post_type']) {
                    if (!current_user_can('edit_page', $post_id)) {
                        return $post_id;
                    }
                } else {
                    if (!current_user_can('edit_post', $post_id)) {
                        return $post_id;
                    }
                }

                /* OK, it's safe for us to save the data now. */
                // Sanitize the user input.
                $mydata['gallery']['first'] = sanitize_text_field($_POST['product_gallery_pic_1']);
                $mydata['gallery']['second'] = sanitize_text_field($_POST['product_gallery_pic_2']);
                $mydata['product_background_img'] = sanitize_text_field($_POST['product_background_img']);
                $mydata['product_picture'] = sanitize_text_field($_POST['product_picture']);
                $products = new DPT_Products();
                $xps = $products->Process($post_id);
                //                $i = 0;
                //                $xps = array();
                //                foreach ($_POST as $kp => $vp) {
                //                    if (!empty($_POST['specific_new' . $i]) && !empty($_POST['specific_detail_new' . $i])) {
                //                        $xps[$i] = array($_POST['specific_new' . $i], $_POST['specific_detail_new' . $i]);
                //                    }
                //                 			$("#obal").after("<img src=" +attachment.url+">");
                $mydata['usage'] = $_POST['product_usage_elements'];
                $mydata['facilities'] = $xps;
                $mydata['sale-terms'] = $_POST['sale_terms_editor'];
                $mydata['guarantee'] = $_POST['guarantee_editor'];
                update_post_meta($post_id, 'dpt_front_product', $_POST['dpt_front_page_product']);
                // Update the meta field.
                update_post_meta($post_id, 'product_meta', $mydata);
                break;
            case "portfolio":
                if (!isset($_POST['portfolio_post_type_form_nonce'])) {
                    return $post_id;
                }

                $nonce = $_POST['portfolio_post_type_form_nonce'];

                // Verify that the nonce is valid.
                if (!wp_verify_nonce($nonce, 'portfolio_post_type_form')) {
                    return $post_id;
                }

                /*
                 * If this is an autosave, our form has not been submitted,
                 * so we don't want to do anything.
                 */
                if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                    return $post_id;
                }

                // Check the user's permissions.
                if ('portfolio' == $_POST['post_type']) {
                    if (!current_user_can('edit_page', $post_id)) {
                        return $post_id;
                    }
                } else {
                    if (!current_user_can('edit_post', $post_id)) {
                        return $post_id;
                    }
                }
                if (!empty($_POST['portfolio_product_list'])) {
                    $data = array();
                    $checkbox_count = count($_POST['portfolio_product_list']);
                    foreach ($_POST['portfolio_product_list'] as $p_id) {
                        $p_option = get_post_meta($p_id, 'related_porfolio')[0];
                        if (empty($p_option)) {
                            update_post_meta($p_id, 'related_porfolio', $post_id);
                        } else {
                            update_post_meta($p_id, 'related_porfolio', $p_option . ',' . $post_id);
                        }
                        if (empty($data)) {
                            $data['product_list'] = $p_id;
                        } else {
                            $data['product_list'] .= ',' . $p_id;
                        }
                    }
                }

                if (!empty($_POST['dpt_portfolio_gallery'])) {
                    $data['portfolio_gallery'] = $_POST['dpt_portfolio_gallery'];
                }
                if (!empty($_POST['dpt_portfolio_customer'])) {
                    $data['customer_id'] = $_POST['dpt_portfolio_customer'];
                }
                update_post_meta($post_id, 'dpt_info', $data);
                break;
        }
    }

    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function RenderProductMetaBox($post) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field('product_post_type_form', 'product_post_type_form_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta($post->ID, 'product_meta', true);
        $array = array(
            'first' => array(
                'post' => '', //$_POST['product_gallery_pic_1'],
                'option' => !empty($value['gallery']['first']) ? $value['gallery']['first'] : ""
            ),
            'second' => array(
                'post' => '', //$_POST['product_gallery_pic_2'],
                'option' => !empty($value['gallery']['second']) ? $value['gallery']['second'] : ""
            )
        );
        foreach ($array as $k => $v) {
            $img[$k] = $this->ImgUrlValue($v);
        }
        $u1 = "";
        if (!empty($value['usage'])) {
            if (!empty($value['usage'])) {
                $u1 = $value['usage'];
            } elseif (!empty($_POST['product_usage_elements'])) {
                $u1 = $_POST['product_usage_elements'];
            }
        }


        if (!empty($value['product_picture'])) {
            if (!empty($value['product_picture'])) {
                $u5 = $value['product_picture'];
            } elseif (!empty($_POST['product_picture'])) {
                $u5 = $_POST['product_picture'];
            }
        }
        if (!empty($value['product_background_img'])) {
            if (!empty($value['product_background_img'])) {
                $u6 = $value['product_background_img'];
            } elseif (!empty($_POST['product_background_img'])) {
                $u6 = $_POST['product_background_img'];
            }
        }
        // Display the form, using the current value.
        //        print_r($value);
        ?>
        <div class="container-fluid dpt">
            <h2>اطلاعات تکمیلی</h2>
            <br />
            <?php
            $count = 0;
            $co = '';

            if (!empty(get_post_meta($post->ID, 'dpt_front_product')[0])) {
                $che = ' checked="" ';
            } else {
                $che = "";
            }

            echo '<div class="form-check-inline">'
            . '<label for="dpt-front-page-product" class="form-check-label">'
            . '<input type="checkbox" value="yes" class="form-check-input" id="dpt-front-page-product" name="dpt_front_page_product" ' . $che . '>نمایش در صفحه اول'
            . '</label>'
            . '</div><br /><br />';

            if (!empty($value['facilities'])) {

                $co .= "<div class='row'>";

                for ($i = 0; $i < sizeof($value['facilities']); $i++) {
                    if (sizeof($value['facilities'][$i]) == 2) {
                        $co .= '<div class="form-group col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
									<label for="specific-new' . $i . '">ویژگی</label>
									<input type="text" class="span6 form-control" name="specific_new' . $i . '"  id="specific-new' . $i . '" value="' . $value['facilities'][$i][0] . '">
									</div>';

                        $co .= '<div class="form-group col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
									<label for="specific-detail-new' . $i . '">توضیح ویژگی</label>
									<input type="text" class="form-control" name="specific_detail_new' . $i . '"  id="specific-detail-new' . $i . '" value="' . $value['facilities'][$i][1] . '">
									</div>';
                        $count = str_replace('specific_detail_new', "", $kk);
                    }//
                }
                $co .= "</div>";
            }
            $co .= '<fieldset class="todos_labels">
							<div class="repeatable">' . Repopulator::repopulate("todos_labels", $_POST, $count) . '</div>
							<div class="form-group">
								<input type="button" value="دکمه" class="btn btn-default add" />
							</div>
						</fieldset>
										<script type="text/template" id="todos_labels">' . Repopulator::$templates["todos_labels"]
                    . '</script>'
                    . '<script>
				$(function() {
					$(".todos_labels .repeatable").repeatable({
						addTrigger: ".todos_labels .add",
						deleteTrigger: ".todos_labels .delete",
						template: "#todos_labels",
						startWith: 1,
						max: 5
					});
				});
				</script>';
            $params = array(
                'gallery' => array(
                    'title' => 'گالری',
                    'content' => '<div class="row">
						<div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
							<div class="form-group">
								<label for="product-gallery-pic-1">عکس اول</label>
								<input type="text" name="product_gallery_pic_1" id="product-gallery-pic-1" class="form-control" value="' . $img['first'] . '" placeholder="">
							</div>
						</div>
						<div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
							<div class="form-group">
								<label for="product-gallery-pic-2">عکس دوم</label>
								<input type="text" name="product_gallery_pic_2" id="product-gallery-pic-2" class="form-control" value="' . $img['second'] . '" placeholder="">
							</div>
						</div>
					</div>',
                    'active' => 'Yes'
                ),
                'facilities' => array(
                    'title' => 'امکانات',
                    'content' => $co,
                    'active' => 'No'
                ),
                'usage' => array(
                    'title' => 'موارد استفاده',
                    'content' => '<div class="row">
						<div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
							<div class="form-group">
								<label for="product-usage-elements">موارد استفاده</label>
								<input type="text" name="product_usage_elements" id="product-usage-elements" class="form-control" value="' . $u1 . '" placeholder="">
									<p>جدا کننده هر مورد , می باشد.</p>
							</div>
						</div>
						</div>',
                    'active' => 'No'
                ),
                'product-picture' => array(
                    'title' => 'تصویر محصول',
                    'content' => '<div class="row">
						<div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
							<div class="form-group">
								<label for="product-picture">تصویر محصول</label>
								<input type="text" name="product_picture" id="product-picture" class="form-control" value="' . $u5 . '" placeholder="">
							</div>
						</div>
						</div>',
                    'active' => 'No'
                ),
                'background-img' => array(
                    'title' => 'تصویر پیش زمینه',
                    'content' => '<div class="row">
						<div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
							<div class="form-group">
								<label for="product-background-img">تصویر پیش زمینه</label>
								<input type="text" name="product_background_img" id="product-background-img" class="form-control" value="' . $u6 . '" placeholder="">
							</div>
						</div>
						</div>',
                    'active' => 'No'
                ),
            );

            $this->ExtraItems($params);
            ?>
        </div>
        <?php
    }

    public function ImgUrlValue($args) {
        $r = "";
        if (!empty($args['option'])) {
            $r = $args['option'];
        } elseif (!empty($args['post'])) {
            $r = $args['post'];
        }

        return $r;
    }

    public function ExtraItems($params) {

        $data = '<!-- Nav tabs -->'
                . '<ul class="nav nav-tabs" role="tablist">';

        foreach ($params as $k => $v) {
            if ($v['active'] == 'Yes') {
                $data .= '<li class="nav-item">'
                        . '<a class="nav-link active" data-toggle="tab" href="#' . $k . '">' . $v['title'] . '</a>'
                        . '</li>';
            } elseif ($v['active'] == 'No') {
                $data .= '<li class="nav-item">'
                        . '<a class="nav-link" data-toggle="tab" href="#' . $k . '">' . $v['title'] . '</a>'
                        . '</li>';
            }
        }
        $data .= '</ul>';
        $data .= '<!-- Tab panes -->'
                . '<div class="tab-content">';
        foreach ($params as $k1 => $v1) {
            if ($v1['active'] == 'Yes') {
                $data .= '<div id="' . $k1 . '" class="container tab-pane active">';
            } elseif ($v1['active'] == 'No') {
                $data .= '<div id ="' . $k1 . '" class = "container tab-pane fade">';
            }
            $data .= '<br />'
                    . '<h4>' . $v1['title'] . '</h4>'
                    . $v1['content']
                    . '</div>';
        }
        $data .= '</div>';
        print($data);
    }

    public function RenderPortfolioGallery($post_id) {
        $meta = get_post_meta($post_id, 'dpt_info')[0];
        if (!empty($meta['portfolio_gallery'])) {
            $gp_array = explode(',', $meta['portfolio_gallery']);
            $img = '';
            foreach ($gp_array as $img_id) {
                $img .= '<div>'
                        . wp_get_attachment_image($img_id)
                        . '</div>';
            }
            echo $img;
        }
    }

}
