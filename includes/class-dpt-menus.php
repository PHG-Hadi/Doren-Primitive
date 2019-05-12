<?php

class DPT_Menus {

    function Menus() {
        add_menu_page(__('Doren Primitive', 'doren'), __('Doren Primitive', 'doren'), 'io', 'pt-options', array($this, 'FrontPage'), '', 15);
    }

    function SubMenus() {
        add_submenu_page('pt-options', __('Front Page', 'doren'), __('Front Page', 'doren'), 'moderate_comments', 'front-page', array($this, 'FrontPage'));
    }

    function Main($args) {

        if ($_GET['page'] == $args['page']) {
            get_template_part('admin/' . $args['first_phrase'], $args['second_phrase']);
        }
    }

    function FrontPage() {
        print('<div class="container dpt">');
        echo'<h1>' . esc_html(get_admin_page_title());
        echo '</h1>';
        do_action('DP_errors');
        $option = get_option('dpt_theme_touch_options');


        $AllP = array(
            'DPFrontPageLogo',
            'top_section',
            'feature_section',
            'DesignSectionLogo',
            'performance_section',
            'services_section',
            'design_section'
        );
        $v = array();
        require_once get_template_directory()."/admin/Front-Page.php";
//        $this->Main(
//                array(
//                    'page' => 'front-page',
//                    'first_phrase' => 'Front',
//                    'second_phrase' => 'Page',
//                )
//        );
        print('</div>');
    }

}
