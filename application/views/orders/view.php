<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Info</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Name : <?=$addressInfo->name?></p>
                            <p>Mobile No: <?=$addressInfo->mobile?></p>
                            <p>Address: <?=$addressInfo->address?>, <?=$addressInfo->city?>, <?=$addressInfo->state?> - <?=$addressInfo->pincode?></p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p><span class="text-primary">#<?=$orderInfo->tracking_id?></span></p>
                            <p>Transaction ID: <?=$orderInfo->transaction_id?></p>
                            <p>Payment Mode: <?=$orderInfo->payment_mode?></p>
                            <p>Ordered Date: <?=date("d,M Y h:i A", strtotime($orderInfo->created_date_time))?></p>
                            <p>Order Status: <?=$orderInfo->tracking_id?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>