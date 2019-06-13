<?php

class DPT_Rest_Api {

    protected $namespaces = "dpt/product";
    protected $rest_base = "form";

    public function RegisterRestRoutes() {
        register_rest_route($this->namespace, '/' . $this->rest_base . '/qoute', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array($this, 'ProductQoute'),
            'args' => array(
                'product_id' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_numeric($param);
                    }
                ),
                'name' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return $param;
                    }
                ),
                'mobile' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_numeric($param);
                    }
                ),
                'email' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_email($param);
                    }
                ),
                'qoute_text' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return $param;
                    }
                )
            )
        ));
    }

    public function ProductQoute($data = array()) {
        $product_id = !isset($data['product_id']) ? "" : absint($data['product_id']);
        $name = !isset($data['name']) ? "" : $data['name'];
        $mobile = !isset($data['mobile']) ? "" : absint($data['mobile']);
        $email = !isset($data['email']) ? "" : $data['email'];
        $qoute_text = !isset($data['qoute_text']) ? "" : $data['qoute_text'];
        $Response['status'] = 200;
        /* Required items */
        if (empty($product_id)) {
            $Response['status'] = 403;
            $Response['message'] = "محصول اجباری میباشد.";
        }
        if (empty($mobile)) {
            $Response['status'] = 403;
            $Response['message'] = "محصول اجباری میباشد.";
        }
        if (empty($name)) {
            $Response['status'] = 403;
            $Response['message'] = "محصول اجباری میباشد.";
        }
        if (empty($email)) {
            $Response['status'] = 403;
            $Response['message'] = "محصول اجباری میباشد.";
        }
        if (empty($qoute_text)) {
            $Response['status'] = 403;
            $Response['message'] = "محصول اجباری میباشد.";
        }

        if ($item_key) {
            $data = WC()->cart->get_cart_item($item_key);
            do_action('wc_cart_rest_add_to_cart', $item_key, $data);
            if (is_array($data)) {
                return new WP_REST_Response($Response['message'], $Response['status']);
            }
        } else {
            return new WP_Error('wc_cart_rest_cannot_add_to_cart', sprintf(__('You cannot add "%s" to your cart.', 'cart-rest-api-for-woocommerce'), $product_data->get_name()), array('status' => 500));
        }
    }

}
