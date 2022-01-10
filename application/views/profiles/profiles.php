<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profiles</h3>
                </div>
                <div class="card-body">
                            <div class="table-reponsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Profile Name</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($profiles) > 0){
                                            $i = 1;
                                            foreach($profiles as $value){
                                            
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=ucwords($value->profile_name)?></td>
                                                    <td>
                                                        <button class="btn btn-xs bg-navy edit" data-id="<?=$value->profile_id."*$".$value->profile_name?>">Edit</button>
                                                        <a onclick="return confirm('Are you sure to delete <?=ucwords($value->profile_name)?> ?')" class="btn btn-xs bg-danger" href="<?=base_url('Profiles/DelProfile/'.$value->profile_id)?>">Delete</a>
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add/Modify Profile</h3>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('Profiles/Add')?>" method="post">
                        <div class="form-group mb-2">
                            <label for="">Profile Name</label>
                            <input type="text" name="profile_name" id="profile_name" class="form-control" required>
                            <input type="hidden" name="profile_id" id="profile_id">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm bg-navy" name="profileSubmit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function(){
    $('.table').DataTable()
    $('.edit').on("click", function(){
        var data = $(this).attr("data-id")
        data = data.split("*$")
        $("#profile_id").val(data[0])
        $("#profile_name").val(data[1])
    })
})
</script>