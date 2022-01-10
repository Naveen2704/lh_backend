
<!-- stock modal -->
<div class="modal fade" id="stock-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Stock</h5>
                <button class="close" data-dismiss="close">&times;</button>
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
                    <h3 class="card-title">Orders List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="orders-list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tracking ID</th>
                                <th>Ordered Date</th>
                                <th>Customer Info</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(count($orders) > 0){
                                $i = 1;
                                foreach($orders as $value){
                                    $userInfo = $this->DefaultModel->getSingleRecord('users', array('user_id'=>$value->created_by));
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
                                        <td><a href="<?=base_url('Orders/orderView/'.$value->order_id)?>"><?=$value->tracking_id?></a></td>
                                        <td><?=date("d M Y h:i A", strtotime($value->created_date_time))?></td>
                                        <td><?=$userInfo->name?></td>
                                        <td><span class="badge <?=$status_color?>"><?=$status?></span></td>
                                        <td>
                                            <a href="<?=base_url('Orders/orderView/'.$value->order_id)?>" class="btn bg-navy btn-xs">View Order Info</a>
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