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
        $FormBody = $request->get_body();
    }

    function MobileValidation($mobile) {
        if (preg_match('/^09[0-9]{9}$/', $mobile)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

}
