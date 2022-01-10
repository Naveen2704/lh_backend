<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modify User</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-md-12">
                        <form method="post" action="<?=base_url("Users/Edituser/".$userInfo->user_id)?>" autocomplete="off">
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Full Name</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="full_name" id="full_name" class="form-control" value="<?=$userInfo->name?>" required>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-4">
                                    <input type="email" name="email" id="email" class="form-control" value="<?=$userInfo->email?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Mobile Number</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="mobile" onkeypress="return numeric()" maxlength="12" id="mobile" class="form-control" value="<?=$userInfo->mobile?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Profile</label>
                                </div>
                                <div class="col-4">
                                    <select name="profile" id="profile" class="form-control" required>
                                        <option selected disabled>--Select Profile--</option>
                                        <?php
                                        if(count($profiles) > 0){
                                            foreach($profiles as $value){
                                                if($value->profile_id==1)
                                                    continue;
                                                ?>
                                                <option value="<?=$value->profile_id?>" <?=($userInfo->profile_id == $value->profile_id)?'selected':''?> ><?=ucwords($value->profile_name)?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-4">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-4 text-right">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-4">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="status" <?=($userInfo->status == 1)?'checked':''?> value="1" id="checkboxPrimary2">
                                        <label for="checkboxPrimary2">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                &nbsp;
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-sm bg-navy" name="edit">Submit</button>
                                </div>
                            </div>

                        </form>
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