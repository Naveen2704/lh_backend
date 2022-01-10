<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_logged_in')) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['products'] = $this->db->query("select * from products order by product_name ASC")->result();
        $data['view'] = "products/list";
        $this->load->view("layout", $data);
    }

    public function AddProduct(){
        $data['artists'] = $this->DefaultModel->getAllRecords('artists');
        $data['artworks'] = $this->DefaultModel->getAllRecords('artwork');
        $data['categories'] = $this->DefaultModel->getAllRecords('categories');
        $data['view'] = "products/add";
        $this->load->view('layout', $data);
    }

    public function Save(){
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        echo "</pre>";
        // exit;
        extract($_POST);
        if(isset($_POST['submit'])){
            if(isset($_FILES['featured_image']['name'])){
                $this->load->library('upload');
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';
                $_FILES['file']['name'] = $_FILES['featured_image']['name'];
                $_FILES['file']['type'] = $_FILES['featured_image']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['featured_image']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['featured_image']['error'];
                $_FILES['file']['size'] = $_FILES['featured_image']['size'];
                $config['file_name'] = "LH".rand(1000,9999).$_FILES['featured_image']['name'];
                $this->upload->initialize($config);
                $this->upload->do_upload('file');
                $fname = $this->upload->data();
                $fileName = trim($fname['file_name']);
                $data['featured_image'] = $fileName;
            }
            $data['product_name'] = $title;
            $data['category'] = $category;
            $data['status'] = $product_status;
            $data['description'] = $description;
            $data['artist_id'] = $artist;
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_date_time'] = date('Y-m-d H:i:s');
            $product_id = $this->DefaultModel->insertDataReturnId('products', $data);
            
            for($i = 1;$i <= $variants;$i++){
                $qtyVar = ${"qty_" . $i};
                $colorVar = ${"color_" . $i};
                $sizesVar = ${"sizes_" . $i};
                $priceVar = ${"price_" . $i};
                $sp_priceVar = ${"sp_price_" . $i};
                $qty = explode(",", $qtyVar);
                $j = 0;
                // images upload
                $img = [];
                for($k = 0;$k < count($_FILES['additional_images_'.$i]['name']);$k++){
                    $config1['upload_path'] = './uploads/products/';
                    $config1['allowed_types'] = 'jpg|JPG|png|PNG|csv|jpeg';

                    $_FILES['additional_images_'.$i.'[]']['name'] = $_FILES['additional_images_'.$i]['name'][$k];
                    $_FILES['additional_images_'.$i.'[]']['type'] = $_FILES['additional_images_'.$i]['type'][$k];
                    $_FILES['additional_images_'.$i.'[]']['tmp_name'] = $_FILES['additional_images_'.$i]['tmp_name'][$k];
                    $_FILES['additional_images_'.$i.'[]']['error'] = $_FILES['additional_images_'.$i]['error'][$k];
                    $_FILES['additional_images_'.$i.'[]']['size'] = $_FILES['additional_images_'.$i]['size'][$k];
                    $config1['file_name'] = "LH".rand(1000,9999).$_FILES['additional_images_'.$i]['name'][$k];
                    $this->upload->initialize($config1);
                    $this->upload->do_upload('additional_images_'.$i.'[]');
                    $fname = $this->upload->data();
                    $img[] = trim($fname['file_name']);
                }

                foreach($sizesVar as $value){
                    $sku = createSKUcode($product_id, strtoupper($value));

                    $data1['product_id'] = $product_id;
                    $data1['color'] = $colorVar;
                    $data1['qty_supplied'] = $qty[$j];
                    $data1['product_size'] = strtoupper($value);
                    $data1['price'] = $priceVar;
                    $data1['sp_price'] = $sp_priceVar;
                    $data1['sku_code'] = $sku;
                    $data1['product_images'] = implode(",", $img);
                    $this->DefaultModel->insertData('product_stock', $data1);
                    echo "<pre>";
                    print_r($data1);
                    echo "</pre>";
                    $j++;
                }                
            }
            // exit;
            $_SESSION['success'] = 1;
            redirect("Products");
        }
    }

    public function del($cid)
    {
        $check = $this->db->select("*")->from("products")->where("product_id", $cid)->get()->num_rows();
        if($check > 0)
        {
            $this->DefaultModel->deleteRecord('products', array('product_id' => $cid));
            $this->session->set_flashdata('msg','Product Deleted Successfully.');
            redirect('Products');
        }
        else{
            redirect('Products');
        }
    }

    public function ViewStock(){
        extract($_POST);
        $view = $this->DefaultModel->getAllRecords('product_stock', array('product_id'=>$product_id));
        if(count($view) > 0){
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Special Price</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($view as $val){
                ?>
                    <tr>
                        <td><?=$val->product_size?></td>
                        <td><?=$val->qty_supplied?></td>
                        <td><?=$val->price?></td>
                        <td><?=$val->sp_price?></td>
                    </tr>
                <?php
            }
            ?>
                </tbody>
            </table>
            <?php
        }
    }

}