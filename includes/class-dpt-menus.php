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
        ?>
        <div class="container">
            <form action="admin.php?page=front-page" method="post" novalidate="">
                <label for="">hi</label>
                <div class="form-group">
                    
                    <textarea class="form-control" name="" rows="6">
                        
                    </textarea>
                </div>
                <button class="btn btn-primary">submit</button>
            </form>
        </div>
            <?php
    }

}
