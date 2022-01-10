<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Quotations</h3>
            <!-- <a href="<?=base_url('Projects/AddProject')?>" class="btn bg-purple btn-xs float-right">Add Project</a> -->
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Application Number</td>
                                    <td>Project Type</td>
                                    <td>Looking For</td>
                                    <td>Budget</td>
                                    <td>Referral Code</td>
                                    <td>Executive Code</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($forms) > 0){
                                    $i = 1;
                                    foreach($forms as $value){
                                        if($value->status == 0){
                                            $status = "Waiting For Approval";
                                            $badge = "badge-primary";
                                        }
                                        elseif($value->status == 1){
                                            $status = "Approved By Manager. Work In Progress";
                                            $badge = "badge-warning";
                                        }
                                        elseif($value->status == 2){
                                            $status = "Work Completed";
                                            $badge = "badge-success";
                                        }
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><span class="badge badge-primary"><?=$value->application_number?></span></td>
                                            <td><?=ucwords($value->project_type)?></td>
                                            <td><?=$value->looking_for?></td>
                                            <td><?=$value->budget?></td>
                                            <td><?=$value->referral_code?></td>
                                            <td><?=$value->executive_code?></td>
                                            <td><span class="badge <?=$badge?>"><?=$status?></span></td>
                                            <td>
                                                <!-- <a href="<?=base_url('Projects/Edit/'.$value->project_id)?>" class="btn btn-xs bg-navy">Edit</a> -->
                                                <a class="btn btn-xs bg-danger">Delete</a>
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
</div>
<script>
$(document).ready(function(){
    $('.table').DataTable()
})
</script>