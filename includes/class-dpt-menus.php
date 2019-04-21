<?php

class DPT_Menus {

    function Menus() {
        add_menu_page(__('Doren Primitive', 'doren'), __('Doren Primitive', 'doren'), 'io', 'pt-options', array($this, 'FrontPage'), '', 15);
    }

    function SubMenus() {
        add_submenu_page('pt-options', __('Front Page', 'doren'), __('Front Page', 'doren'), 'moderate_comments', 'front-page', array($this, 'FrontPage'));
    }

    function Main($args) {
        print('<div class="container dpt">');
        echo'<h1>' . esc_html(get_admin_page_title());
        echo '</h1>';
        do_action('DP_errors');
        if ($_GET['page'] == $args['page']) {
            get_template_part('admin/' . $args['first_phrase'], $args['second_phrase']);
        }
        print('</div>');
    }

    function FrontPage() {
        $this->Main(
                array(
                    'page' => 'front-page',
                    'first_phrase' => 'Front',
                    'second_phrase' => 'Page',
                )
        );
    }

}
