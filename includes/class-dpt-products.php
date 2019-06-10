<?php

class DPT_Products {

    private $Max = 6;
    private $Facilities = array();
    private $ProductId = "";

    function Process($post_id) {
        $this->SetProductId($post_id);
        if ($this->GetFacilitiesCount($post_id) < $this->Max) {
            
        }
    }

    function SetProductId($post_id) {
        $this->ProductId = $post_id;
    }

    function GetProductId() {
        return $this->ProductId;
    }

    function GetFacilitiesCount($post_id) {
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