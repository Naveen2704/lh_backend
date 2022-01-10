<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Referral Codes</h3>
                </div>
                <div class="card-body">
                            <div class="table-reponsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Referral Code</td>
                                            <td>Percentage & Description</td>
                                            <td>Limit</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(count($referrals) > 0){
                                            $i = 1;
                                            foreach($referrals as $value){
                                                $data = $value->code."*$".$value->limitations."*$".$value->code_id."*$".$value->percentage."*$".$value->description;
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=strtoupper($value->code)?></td>
                                                    <td><?=$value->percentage?>% Off<p><?=$value->description?></p></td>
                                                    <td><?=$value->limitations?></td>
                                                    <td>
                                                        <button class="btn btn-xs bg-navy edit" data-id="<?=$data?>"><i class="fas fa-edit"></i></button>
                                                        <a onclick="return confirm('Are you sure to delete ?')" class="btn btn-xs bg-danger" href="<?=base_url('Referrals/DelReferral/'.$value->code_id)?>"><i class="fas fa-trash"></i></a>
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
                    <h3 class="card-title">Add/Modify Referral Code</h3>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('Referrals/Add')?>" method="post">
                        <div class="form-group mb-2">
                            <label for="">Referral Code</label>
                            <input type="text"  name="referral_code" id="referral_code" class="form-control text-uppercase" required>
                            <input type="hidden" name="code_id" id="code_id">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Percentage(%) Off</label>
                            <input type="text"  name="percentage" id="percentage" onkeypress="return decimal()" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Limit</label>
                            <input type="text"  name="limit" id="limit" onkeypress="return numeric()" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm bg-navy" name="referralSubmit">Submit</button>
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
        $("#code_id").val(data[2])
        $("#referral_code").val(data[0])
        $("#limit").val(data[1])
        $("#description").val(data[4])
        $("#percentage").val(data[3])
    })
})
</script>