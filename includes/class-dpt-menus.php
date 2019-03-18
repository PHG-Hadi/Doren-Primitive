<?php

class DPT_Menus {

    function Menus() {
        add_menu_page('تنظیمات قالب پارس تاچ', 'تنظیمات قالب پارس تاچ', 'moderate_comments', 'pt-options', array($this, 'Dashboard'), '', 15);
    }

    function SubMenus() {
        add_submenu_page('pt-options', 'صفحه اصلی', 'صفحه اصلی', 'moderate_comments', 'front-page', array($this, 'FrontPage'));
    }

    function Dashboard() {
        
    }

    function FrontPage() {
        wp_nonce_field();
        ?>
        <div class="container dpt">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="admin.php?page=front-page" method="post" novalidate="">
                
                <div class="form-group" id="design-section" name="front_design_section">
                    <label for="design-section">بخش طراحی</label>
                    <textarea class="form-control" name="" rows="6">
                        
                    </textarea>
                </div>
                <button class="btn btn-primary" name="dpt_home_page">ذخیره</button>
            </form>
        </div>
            <?php
    }

}
