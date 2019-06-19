<?php

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
echo "<br /><br />";
print_r($v);
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
    <section>
        <h3><?php _e('Top Section', 'doren'); ?></h3>
        <?php
        $editor_id = 'top_section';

        wp_editor(esc_html($v['front']['top_section']), $editor_id);
        ?>
    </section>
    <hr />
    <section id="Front-Feature-Section">
        <h3><?php _e('Feature Section', 'doren'); ?></h3>
        <?php
        $editor_id = 'feature_section';

        wp_editor($v['front']['feature_section'], $editor_id);
        ?>
    </section>
    <hr />
    <section>
        <div class="" id="design">
            <?php
            dpt_input(array(
                'id' => 'design-section-logo',
                'label' => 'Design Logo',
                'name' => 'DesignSectionLogo',
                'value' => $v['front']['DesignSectionLogo']
            ));
            ?>
        </div>
        <div id="design-section">
            <h3 for="front_design_section"><?php _e('Design Section', 'doren'); ?></h3>
            <?php
            $editor_id = 'design_section';
            wp_editor($v['front']['design_section'], $editor_id);
            ?>
        </div>
        <hr />
        <div id="services">
            <h3 for="front_services_section"><?php _e('Services Section', 'doren'); ?></h3>
            <?php
            $editor_id = 'services_section';
            wp_editor($v['front']['services_section'], $editor_id);
            ?>
        </div>
        <div id="performance">
            <h3 for="performance_section"><?php _e('Performance Section', 'doren'); ?></h3>
            <?php
            $editor_id = 'performance_section';
            wp_editor($v['front']['performance_section'], $editor_id);
            ?>
        </div>
    </section>
    <button class="btn btn-primary" name="dpt_home_page">ذخیره</button>
</form>