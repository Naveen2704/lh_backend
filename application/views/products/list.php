
<!-- stock modal -->
<div class="modal fade" id="stock-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Stock</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">Getting Data <i class="fas fa-spinner fa-spin"></i></p>
            </div>
        </div>
    </div>
</div>
<!-- stock modal ends -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products List</h3>
                    <a href="<?=base_url('Products/AddProduct')?>" class="btn btn-xs float-right bg-purple">Add Product</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Colors</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(count($products) > 0) {
                                $i = 1;
                                foreach($products as $value){
                                    $catInfo = $this->DefaultModel->getSingleRecord('categories', array('category_id'=>$value->category));
                                    if($value->status == "inactive"){
                                        $status = "Inactive";
                                        $status_color = "badge-danger";
                                    }
                                    elseif($value->status == "coming_soon"){
                                        $status = "Coming Soon";
                                        $status_color = "badge-info";
                                    }
                                    elseif($value->status == "out_of_stock"){
                                        $status = "Out of Stock";
                                        $status_color = "badge-warning";
                                    }
                                    elseif($value->status == "published"){
                                        $status = "Published";
                                        $status_color = "badge-success";
                                    }
                                    $stockInfo = $this->db->query("select color from product_stock where product_id='".$value->product_id."' group by color")->result();
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><img src="<?=base_url('uploads/products/'.$value->featured_image)?>" width="35" height="35" style="border-radius:50%"></td>
                                        <td><?=$value->product_name?></td>
                                        <td>
                                            <?php
                                            if(count($stockInfo) > 0){
                                                foreach($stockInfo as $val){
                                                    ?>
                                                    <i class="fas fa-circle mx-2 shadow border-dark border" title="<?=$val->color?>" style="font-size:25px;color:<?=$val->color?>;border-radius:50%"></i>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?=$catInfo->category_name?></td>
                                        <td>
                                            <span class="badge <?=$status_color?>"><?=$status?></span>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-xs bg-primary">Edit</a>
                                            <button class="btn btn-xs bg-success view_stock" id="<?=$value->product_id?>" data-toggle="modal" data-target="#stock-modal">View Stock</button>
                                            <a href="<?=base_url('Products/Del/'.$value->product_id)?>" onclick="return confirm('Are you sure?')" class="btn btn-xs bg-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#products-list').DataTable();

        // view Stock
        $('.view_stock').on("click", function(){
            var id = $(this).attr('id')
            $('#stock-modal .modal-body').html('<p class="text-center">Getting Data <i class="fas fa-spinner fa-spin"></i></p>')
            $.post("<?=base_url('Products/ViewStock')?>", {"product_id": id}, function(res){
                $('#stock-modal .modal-body').html(res)
            })
        })


    })
</script>