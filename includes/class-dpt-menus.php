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
        $option = get_option('dpt_theme_touch_options');
        $option['front']['dpt_design_section'] = !empty($_POST['dpt_design_section']) ? $_POST['dpt_design_section'] : $option['front']['dpt_design_section'];
        $option['front']['dpt_services_section'] = !empty($_POST['dpt_services_section']) ? $_POST['dpt_services_section'] : $option['front']['dpt_services_section'];
        $option['front']['dpt_performance_section'] = !empty($_POST['dpt_performance_section']) ? $_POST['dpt_performance_section'] : $option['front']['dpt_performance_section'];
        ?>
        <div class="container dpt">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="admin.php?page=front-page" method="post" novalidate="">
                <?php
                wp_nonce_field('home_page_nonce_', 'dpt_home_page');
                ?>
                <section>
                    <h3>بخش چرا پارس تاچ؟</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#design">طراحی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#services">خدمات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#performance">کارایی</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="design">
                            <div class="form-group" id="design-section" name="front_design_section">
                                <label for="design-section">بخش طراحی</label>
                                <textarea id="design-section" class="form-control" name="dpt_design_section" rows="6">
                                    <?php echo base64_decode($option['front']['dpt_design_section']) ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="services">
                            <div class="form-group" id="design-section" name="front_design_section">
                                <label for="services-section">بخش خدمات</label>
                                <textarea id="services-section" class="form-control" name="dpt_services_section" rows="6">
                                    <?php echo $option['front']['dpt_services_section']; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="performance">
                            <div class="form-group" id="design-section" name="front_design_section">
                                <label for="performance-section">بخش کارایی</label>
                                <textarea id="performance-section" class="form-control" name="dpt_performance_section" rows="6" value="<?php ?>">
                                    <?php
                                    // echo $option['front']['dpt_performance_section']; 
//                                    wp_editor($option['front']['dpt_performance_section'], "ss")
                                    $option['front']['dpt_performance_section'];
                                    ?>
                                </textarea>

                            </div>
                        </div>
                    </div>

                </section>
                <button class="btn btn-primary" name="dpt_home_page">ذخیره</button>
            </form>
        </div>
        <?php
    }

}
