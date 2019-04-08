<?php

class DPT_Product_Meta_Box {

    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'AddProductMetaBox'));
        add_action('save_post', array($this, 'Save'));
    }

    /**
     * Adds the meta box container.
     */
    public function AddProductMetaBox($post_type) {
        // Limit meta box to certain post types.
        $post_types = array('product');

        if (in_array($post_type, $post_types)) {
            add_meta_box(
                    'product_meta_box', 'اطلاعات تکمیلی', array($this, 'RenderProductMetaBox'), $post_type, 'advanced', 'high'
            );
        }
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
        if ('product' == $_POST['post_type']) {
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
        foreach ($_POST as $key => $value) {
            if (strpos($key, "specific_new") !== FALSE || strpos($key, "specific_detail_new") !== FALSE) {
                $xps [$key] = $value;
            }
        }

        $mydata['usage'] = $_POST['product_usage_elements'];
        $mydata['facilities'] = $xps;
        $mydata['sale-terms'] = $_POST['sale_terms_editor'];
        $mydata['guarantee'] = $_POST['guarantee_editor'];
        // Update the meta field.
        update_post_meta($post_id, 'product_meta', $mydata);
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
                'post' => $_POST['product_gallery_pic_1'],
                'option' => $value['gallery']['first']
            ),
            'second' => array(
                'post' => $_POST['product_gallery_pic_2'],
                'option' => $value['gallery']['second']
            )
        );
        foreach ($array as $k => $v) {
            $img[$k] = $this->ImgUrlValue($v);
        }

        if (empty($_POST['product_usage_elements']) && $value['usage']) {
            $u1 = "";
        } elseif (!empty($value['usage'])) {
            $u1 = $value['usage'];
        } elseif (!empty($_POST['product_usage_elements'])) {
            $u1 = $_POST['product_usage_elements'];
        }

        // Display the form, using the current value.
        ?>
        <div class="container-fluid dpt">
            <h2>اطلاعات تکمیلی</h2>
            <br />
            <?php
            $count = 0;
            if (!empty($value['facilities'])) {

                $co .= "<div class='row'>";
                foreach ($value['facilities'] as $kk => $vv) {

                    if (strpos($kk, "specific_new") !== FALSE) {
                        $co .= '<div class="form-group col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <label for="' . $kk . '">ویژگی</label>
                            <input type="text" class="span6 form-control" name="' . $kk . '"  id="' . $kk . '" value="' . $vv . '">
                            </div>';
                        $count = str_replace('specific_new', "", $kk);
                    }
                    if (strpos($kk, "specific_detail_new") !== FALSE) {
                        $co .= '<div class="form-group col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                            <label for="' . $kk . '">توضیح ویژگی</label>
                            <input type="text" class="form-control" name="' . $kk . '"  id="' . $kk . '" value="' . $vv . '">
                            </div>';
                        $count = str_replace('specific_detail_new', "", $kk);
                    }
                }
                $co .= "</div>";
            }
            $co .= '<fieldset class="todos_labels">
					<div class="repeatable">' . Repopulator::repopulate("todos_labels", $_POST, $count) . '</div>
					<div class="form-group">
						<input type="button" value="افزودن" class="btn btn-default add" />
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
                    /* 'sale-terms' => array(
                      'title' => 'شرایط فروش',
                      'content' => '',
                      'active' => 'No'
                      ),
                      'guarantee' => array(
                      'title' => 'شرایط خدمات پس از فروش',
                      'content' => '',
                      'active' => 'No'
                      ), */
            );

            $this->ExtraItems($params);
            ?>
        </div>
        <hr>
        <h4>شرایط فروش</h4>
        <?php
        $settings = array(
            'teeny' => true,
            'textarea_rows' => 15,
            'tabindex' => 1
        );


        $editor_id = 'sale_terms_editor';
        $uploaded_csv = get_post_meta($post->ID, 'product_meta', true);
        wp_editor($uploaded_csv['sale-terms'], $editor_id);

        echo "<hr/>"
        . "<h4>شرایط خدمات پس از فروش</h4>";

        $editor_id = 'guarantee_editor';
        $uploaded_csv = get_post_meta($post->ID, 'product_meta', true);
        wp_editor($uploaded_csv['guarantee'], $editor_id);
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

}
