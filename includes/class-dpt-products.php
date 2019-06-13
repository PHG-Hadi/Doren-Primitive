<?php

class DPT_Products {

    private $Max = 6;
    private $Facilities = array();
    private $ProductId = "";

    function Process($post_id) {
        $this->SetProductId($post_id);
        $count = $this->GetFacilitiesCount($post_id);
        $s_fa = array();
        if ($count == 0) {


            $x = $this->GetPostedFacilities();

            $this->SetFacilities($x);
            $s_fa = deca_shop_traverse_array($this->GetFacilities());
        } else {
            $p_fa = $this->GetPostedFacilities();
            $this->SetFacilities($p_fa);

            return $this->GetFacilities();
        }
    }

    function SetProductId($post_id) {
        $this->ProductId = $post_id;
    }

    function GetProductId() {
        return $this->ProductId;
    }

    function GetFacilitiesCount($post_id) {
        $count = 0;
        if (!empty(get_post_meta($post_id, 'product_meta')[0]['facilities']))
            $count = sizeof(get_post_meta($post_id, 'product_meta')[0]['facilities']);
        if (empty(get_post_meta($post_id, 'product_meta')[0]['facilities']))
            $count = 0;

        return $count;
    }

    function SetFacilities($facilities) {
        $this->Facilities = $facilities;
    }

    function GetFacilities() {
        return $this->Facilities;
    }

    function GetPostedFacilities() {
        $i = 0;
        $xps = array();
        foreach ($_POST as $kp => $vp) {
            if (!empty($_POST['specific_new' . $i]) && !empty($_POST['specific_detail_new' . $i]) && $i < 6) {
                $xps[$i] = array($_POST['specific_new' . $i], $_POST['specific_detail_new' . $i]);
            }
            ++$i;
        }
        return $xps;
    }

    function SavedFacilities() {
        return get_post_meta($this->GetProductId(), 'product_meta')[0]['facilities'];
    }

    function check_diff_multi($array1, $array2) {
        $result = array();
        foreach ($array1 as $key => $val) {
            if (isset($array2[$key])) {
                if (is_array($val) && $array2[$key]) {
                    $result[$key] = $this->check_diff_multi($val, $array2[$key]);
                }
            } else {
                $result[$key] = $val;
            }
        }

        return $result;
    }

}
