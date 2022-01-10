<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Branch</h4>
            <a href="<?=base_url('Branches')?>" class="btn btn-xs bg-purple float-right">Go Back to branches</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="" enctype="multipart/form-data" action="<?=base_url('Branches/Add')?>" method="post">
                        <div class="form-group">
                            <label class="control-label">Name of the Branch</label>
                            <input type="text" class="form-control" name="branch_name" required >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Branch Address</label>
                            <textarea class="form-control" name="branch_address" required ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">State</label>
                            <select class="form-control" name="state" id="state">
                                <option selected disabled>Select State</option>
                                <?php
                                if(count($states) > 0){
                                    foreach($states as $value){
                                        ?>
                                        <option value="<?=$value->city_state?>"><?=$value->city_state?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <select class="form-control" name="city" id="city">
                                <option selected disabled>Select City</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#state').on("change", function(){
            var state = $(this).val();
            $.post("<?=base_url('Branches/getCities')?>", {state:state}, function(data){
                $('#city').html(data);
            });
        });
    });
</script>