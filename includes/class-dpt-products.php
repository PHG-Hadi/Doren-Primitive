<?php

class DPT_Products {

    private $Max = 6;
    private $Facilities = array();
    private $ProductId = "";

    function Process($post_id) {
        $this->SetProductId($post_id);
        $count = $this->GetFacilitiesCount();
        $s_fa = array();
        if ($count == 0) {
            $s_fa = $this->SetFacilities($this->GetPostedFacilities());
        } else {
            $this->SetFacilities($this->SavedFacilities());
            $s_fa = $this->GetFacilities();
            $p_fa = $this->GetPostedFacilities();
            $result = array_intersect($s_fa, $p_fa);
            $diff = array_diff($p_fa, $result);
            $max = absint($this->Max - sizeof($s_fa));
            foreach ($diff as $k => $v) {
                if ($max != 0) {
                    $s_fa[] = $v;
                    --$max;
                }
            }
        }
        $this->SetFacilities($s_fa);
        return $this->Facilities;
    }

    function SetProductId($post_id) {
        $this->ProductId = $post_id;
    }

    function GetProductId() {
        return $this->ProductId;
    }

    function GetFacilitiesCount() {
        $post_id = $this->GetProductId();
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
            if (!empty($_POST['specific_new' . $i]) && !empty($_POST['specific_detail_new' . $i])) {
                $xps[$i] = array($_POST['specific_new' . $i], $_POST['specific_detail_new' . $i]);
            }
            ++$i;
        }
        return $xps;
    }

    function SavedFacilities() {
        return get_post_meta($this->GetProductId(), 'product_meta')[0]['facilities'];
    }

}

/*
 * 1- i checkeck $_post with specific_new and specific_detail_new keys
 * 2- i want add 6 item into db
 * 3- if items was more than 6 display an error
 * ------------------------------------------
 * class DPT_Products
 * DPT_Products class return an array of all facilities
 * method get_count_of_facilities
 * max facilities is 6
 * need Facilities Property is private
 * in constructor product id is as param
 * get form value { $_post itteration}
 * save facilities
 */