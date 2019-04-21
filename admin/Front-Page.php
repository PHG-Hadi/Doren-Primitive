<?php
$option = get_option('dpt_theme_touch_options');
$AllP = array('DPFrontPageLogo', 'front_feature_section', 'DesignSectionLogo', 'design-section', 'services-section', 'dpt_performance_section');
$v = array();
foreach ($AllP as $vv) {
    if (!empty($option['front'][$vv])) {
        $v['front'][$vv] = $option['front'][$vv];
    } else {
        $v['front'][$vv] = "";
    }
}
foreach ($_POST as $k2 => $v2) {
    if (in_array($k2, $AllP)) {
        if (!empty($option['front'][$v2])) {
            $v['front'][$k2] = $option['front'][$v2];
        } else {
            $v['front'][$k2] = "";
        }
    }
}
?>
<form action="admin.php?page=front-page" method="post" novalidate="">
    <?php
    wp_nonce_field('home_page_nonce_', 'dpt_home_page');
    ?>
    <section id="HomePageLogo">
        <h3><?php _e('Logo section', 'doren'); ?></h3>
        <?php
        dpt_input(array(
            'id' => 'front-page-logo',
            'label' => 'Logo',
            'name' => 'DPFrontPageLogo',
            'value' => $v['front']['DPFrontPageLogo']
        ));
        ?>
    </section>
    <section id="Front-Feature-Section">
        <h3><?php _e('Feature Section', 'doren'); ?></h3>
        <?php
        $editor_id = 'front_feature_section';

        wp_editor($v['front']['front_feature_section'], $editor_id);
        ?>
    </section>
    <hr />
    <section>
        <h3><?php _e('Why Section', 'doren'); ?></h3>
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
                <?php
                dpt_input(array(
                    'id' => 'design-section-logo',
                    'label' => 'Design Logo',
                    'name' => 'DesignSectionLogo',
                    'value' => $v['front']['DesignSectionLogo']
                ));
                ?>
                <div class="form-group" id="design-section" name="front_design_section">
                    <label for="design-section">بخش طراحی</label>
                    <textarea id="design-section" class="form-control" name="dpt_design_section" rows="6">
                        <?php echo $v['front']['design-section']; ?>
                    </textarea>
                </div>
            </div>
            <div class="tab-pane container fade" id="services">
                <div class="form-group" id="services-section" name="front_design_section">
                    <label for="services-section">بخش خدمات</label>
                    <textarea id="services-section" class="form-control" name="dpt_services_section" rows="6">
                        <?php echo $v['front']['services-section']; ?>
                    </textarea>
                </div>
            </div>
            <div class="tab-pane container fade" id="performance">
                <div class="form-group" id="performane-section" name="front_design_section">
                    <label for="performance-section">بخش کارایی</label>
                    <textarea id="performance-section" class="form-control" name="dpt_performance_section" rows="6" value="<?php echo $v['front']['dpt_performance_section']; ?>">
                        <?php
// echo $option['front']['dpt_performance_section']; 
//                                    wp_editor($option['front']['dpt_performance_section'], "ss")
                        $v['front']['performane-section'];
                        ?>
                    </textarea>

                </div>
            </div>
        </div>

    </section>
    <button class="btn btn-primary" name="dpt_home_page">ذخیره</button>
</form>