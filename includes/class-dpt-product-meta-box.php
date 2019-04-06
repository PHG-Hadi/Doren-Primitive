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

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['myplugin_inner_custom_box_nonce'])) {
            return $post_id;
        }

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'myplugin_inner_custom_box')) {
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
        if ('page' == $_POST['post_type']) {
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
        $mydata = sanitize_text_field($_POST['myplugin_new_field']);

        // Update the meta field.
        update_post_meta($post_id, '_my_meta_value_key', $mydata);
    }

    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function RenderProductMetaBox($post) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta($post->ID, '_my_meta_value_key', true);

        // Display the form, using the current value.
        ?>
        <div class="container">
            <h2>اطلاعات تکمیلی</h2>
            <br />
            <?php
            $params = array(
                'gallery' => array(
                    'title' => 'گالری',
                    'content' => '<div class="row">
                <div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
                    <div class="form-group">
                        <label for="">زهرا</label>
                        <input type="text" name="" id="" class="form-control" value="" placeholder="">
                    </div>
                </div>
                <div class="col-lg-6 col-12 col-md-6 col-xl-6 col-sm-12">
                    <div class="form-group">
                        <label for="">هادی</label>
                        <input type="text" name="" id="" class="form-control" value="" placeholder="">
                    </div>
                </div>
            </div>',
                    'active' => 'Yes'
                ),
                'facilities' => array(
                    'title' => 'امکانات',
                    'content' => '',
                    'active' => 'No'
                ),
                'usage' => array(
                    'title' => 'موارد استفاده',
                    'content' => '',
                    'active' => 'No'
                ),
                'sale-terms' => array(
                    'title' => 'شرایط فروش',
                    'content' => '',
                    'active' => 'No'
                ),
                'guarantee' => array(
                    'title' => 'شرایط خدمات پس از فروش',
                    'content' => '',
                    'active' => 'No'
                ),
            );
            $this->ExtraItems($params);
            ?>
        </div>
        <?php
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
                    . '<h3>' . $v1['title'] . '</h3>'
                    . $v1['content']
                    . '</div>';
        }
        $data .= '</div>';
        print($data);
    }

}
