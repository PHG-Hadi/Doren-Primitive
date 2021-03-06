<?php

class DPT_From_Handlers {

    protected $messages = array();

    function init() {
        $this->FrontPageSection();
    }

    function FrontPageSection() {

        $get_option = get_option('dpt_theme_touch_options');
        if (empty($get_option)) {
            $get_option = array();
        }
        if (isset($_POST['dpt_home_page']) /* && check_admin_referer('home_page_nonce_', 'dpt_home_page') */) {
            $AllP = array(
                'DPFrontPageLogo',
                'top_section',
                'feature_section',
                'DesignSectionLogo',
                'performance_section',
                'services_section',
                'design_section'
            );


            if (!empty($get_option)) {
                foreach ($get_option['front'] as $k => $v) {
                    if (in_array($k, $AllP)) {
                        $get_option['front'][$k] = esc_html($v);
                    } else {
                        $get_option['front'][$k] = "";
                    }
                }
            }
            foreach ($_POST as $k1 => $v1) {
                if (in_array($k1, $AllP)) {
                    $get_option['front'][$k1] = esc_html($v1);
                }
            }
        }
        update_option('dpt_theme_touch_options', $get_option);
    }

}
