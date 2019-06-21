<?php

class DPT_Rest_Routes {

    protected $RestBase = "/v1";
    protected $NameSpace = "dpt";
    protected $Forms = "/forms";

    function RegisterRestRoutes() {
        register_rest_route($this->NameSpace, $this->RestBase . $this->Forms . '/product', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array($this, 'ProductForm'),
                )
        );
    }

    function ProductForm(WP_REST_Request $request) {
        $FormBody = json_decode($request->get_body());
        $FormHeader = $request->get_headers();
        if ($FormHeader == 'json') {
            $p_id = $FormBody['product_id'];
            $name = $FormBody['name'];
            $message = $FormBody['message'];
            $mobile = $FormBody['mobile'];
            $email = $FormBody['email'];
        }
    }

}
