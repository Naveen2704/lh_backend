<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Projects</h3>
            <a href="<?=base_url('Projects/AddProject')?>" class="btn bg-purple btn-xs float-right">Add Project</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Project Title</td>
                                    <td>Description</td>
                                    <td>State</td>
                                    <td>City</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($projects) > 0){
                                    $i = 1;
                                    foreach($projects as $value){
                                        $cities = $this->db->query("select * from cities where city_id='".$value->city."'")->row();
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
                                            <td><?=$value->title?></td>
                                            <td><?=$value->short_description?></td>
                                            <td><?=$value->state?></td>
                                            <td><?=$cities->city_name?></td>
                                            <td><span class="badge <?=$badge?>"><?=$status?></span></td>
                                            <td>
                                                <a href="<?=base_url('Projects/Edit/'.$value->project_id)?>" class="btn btn-xs bg-navy">Edit</a>
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