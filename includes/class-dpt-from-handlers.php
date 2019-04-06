<?php

class DPT_From_Handlers {

    function init() {
        error_log("bomo ",0);
//        add_action('after_setup_theme', array($this, 'FrontPageSection'));
        $this->FrontPageSection();
    }

    function FrontPageSection() {
        error_log("jigsaw  ", 0);
        $get_option = get_option('dpt_theme_touch_options');
        if (isset($_POST['dpt_home_page']) && check_admin_referer('home_page_nonce_', 'dpt_home_page')) {
            $get_option = get_option('dpt_theme_touch_options');
            $get_option['front']['dpt_design_section'] = !empty($_POST['dpt_design_section']) ? $_POST['dpt_design_section'] : $get_option['front']['dpt_design_section'];
            $get_option['front']['dpt_services_section'] = !empty($_POST['dpt_services_section']) ? $_POST['dpt_services_section'] : $get_option['front']['dpt_services_section'];
            $get_option['front']['dpt_performance_section'] = !empty($_POST['dpt_performance_section']) ? $_POST['dpt_performance_section'] : $get_option['front']['dpt_performance_section'];
        }
        update_option('dpt_theme_touch_options', $get_option);
    }

}
