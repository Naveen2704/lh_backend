
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-2 ml-2 mt-0"> Dashboard</h3>
        </div>
    </div>
    <div class="row col-12">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3><?=$catCount?></h3>
                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <a href="<?=base_url('Categories')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3><?=$proCount?></h3>

                <p>Products</p>
            </div>
            <div class="icon">
                <i class="fa fa-bars"></i>
            </div>
            <a href="<?=base_url('Products')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3><?=$ordersCount?></h3>

                <p>Orders</p>
            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
            <a href="<?=base_url('Orders')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3><?=$custCount?></h3>

                <p>Customers</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?=base_url('Users')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- </div> -->
    
    <div class="row col-12">
        <div class="col-md-6 col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="mb-0">Recent Orders List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tracking ID</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(count($orders) > 0){
                                $i = 1;
                                foreach($orders as $value){
                                    if($value->status == 1){
                                        $status = "Ordered";
                                        $status_color = "badge-warning";
                                    }
                                    elseif($value->status == 2){
                                        $status = "Delivered";
                                        $status_color = "badge-success";
                                    }
                                    elseif($value->status == 3){
                                        $status = "Cancelled";
                                        $status_color = "badge-danger";
                                    }
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><a href="orderView.php?id=<?=$value->order_id?>"><?=$value->tracking_id?></a></td>
                                        <td><?=date("d M Y h:i A", strtotime($value->created_date_time))?></td>
                                        <td><span class="badge <?=$status_color?>"><?=$status?></span></td>
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
        <div class="col-md-6 col-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h5 class="mb-0">Recently Added Products</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(count($newProducts) > 0){
                                $i = 1;
                                foreach($newProducts as $value){
                                    $catInfo = getCategoryInfo($value->category);
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
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$value->product_name?></td>
                                        <td><?=$catInfo->category_name?></td>
                                        <td><span class="badge <?=$status_color?>"><?=$status?></span></td>
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