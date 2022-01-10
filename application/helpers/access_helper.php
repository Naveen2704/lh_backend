<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// include "phpqrcode/qrlib.php";
if ( ! function_exists('is_logged_in'))

{

    function is_logged_in()
    {
        $CI =& get_instance();

        $user = $CI->session->userdata('is_logged_in');

        if (!isset($user)) { return false; } else { return true; }

    }

    function generateTrackingId($order_id){
        return "LH-ORD00".$order_id;
    }

    function getCategoryInfo($category_id){
        $CI =& get_instance();
        $catInfo = $CI->db->query("select * from categories where category_id='".$category_id."'")->row();
        return $catInfo;
    }

    function proInfo($product_id){
        $CI =& get_instance();
        $info = $CI->db->query("select * from products where product_id='".$product_id."'")->row();
        return $info;
    }

    function getArtistName($artist_id){
        $CI =& get_instance();
        $info = $CI->db->query("select * from artists where artist_id='".$artist_id."'")->row();
        return $info->artist_name;
    }

    function stockInfo($stock_id){
        $CI =& get_instance();
        $info = $CI->db->query("select * from product_stock where product_stock_id='".$stock_id."'")->row();
        return $info;
    }

    function getCatProducts($category_id){
        $CI =& get_instance();
        $proCount = $CI->db->query("select * from products where category='".$category_id."'")->num_rows();
        return $proCount;
    }

    function createSKUcode($product_id, $size){
        $CI =& get_instance();
        $stockInfo = $CI->db->query("select product_stock_id from product_stock")->num_rows();
        return $skuCode = "LH0".$product_id.$size.$stockInfo;
    }

    function getColors($product_id){
        $CI =& get_instance();
        $colors = $CI->db->query("select color from product_stock where product_id='".$product_id."' group by color")->result();
        return $colors;
    }

    function getSizes($product_id){
        $CI =& get_instance();
        $sizes = $CI->db->query("select product_size from product_stock where product_id='".$product_id."' group by product_size")->result();
        return $sizes;
    }

    function sendSmsNew($mobile_no, $msg, $template_id) {
        $profile_id = 'MANVAT';
        $api_key = '010km0X150egpk3lD9dQ';
        $sender_id = 'OUMDAA';
        $mobile = $mobile_no;
        $sms_text = urlencode($msg);

        //Submit to server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://bulksms.co/sendmessage.php?");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user=MANAVATHA&password=8463942285&mobile=" . $mobile . "&message=" . $sms_text . "&sender=" . $profile_id . "&type=3&template_id=" . $template_id);
        $response = curl_exec($ch);
        echo "<pre>";print_r($ch);echo "</pre>";
        echo $response . "<br>";
        // return $response;
        curl_close($ch);
    }

}

?>