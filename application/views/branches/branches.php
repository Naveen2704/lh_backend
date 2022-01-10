<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branches</h3>
            <a href="<?=base_url('Branches/Add')?>" class="btn bg-purple btn-xs float-right">Add Branch</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>City</td>
                                    <td>State</td>
                                    <td>No of Users</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($branches) > 0){
                                    $i = 1;
                                    foreach($branches as $value){
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$value->category_name?></td>
                                            <td><?=$value->address?></td>
                                            <td><?=$value->city?></td>
                                            <td><?=$value->state?></td>
                                            <td><?=$i?></td>
                                            <td><span class="badge"><?=$value->status?></span></td>
                                            <td><?=$value->address?></td>
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
</div>