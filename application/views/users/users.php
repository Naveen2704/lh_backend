<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customers</h3>
            <!-- <a href="<?=base_url('Users/Adduser')?>" class="btn bg-purple btn-xs float-right">Add User</a> -->
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
                                    <td>Mobile</td>
                                    <td>Email</td>
                                    <!-- <td>Profile</td> -->
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($users) > 0){
                                    $i = 1;
                                    foreach($users as $value){
                                        $profiles = $this->db->query("select * from profiles where profile_id='".$value->profile_id."'")->row();
                                        if($value->status == 0){
                                            $status = "Inactive";
                                            $badge = "badge-danger";
                                        }
                                        elseif($value->status == 1){
                                            $status = "Active";
                                            $badge = "badge-success";
                                        }
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->mobile?></td>
                                            <td><?=$value->email?></td>
                                            <!-- <td><?=ucwords($profiles->profile_name)?></td> -->
                                            <td><span class="badge <?=$badge?>"><?=$status?></span></td>
                                            <td>
                                                <a href="" class="btn bg-navy btn-xs">Send Notification</a>
                                                <a href="" class="btn bg-info btn-xs">View Orders</a>
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