<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upload Images</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=base_url("Gallery/Add")?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4 text-right">
                                <label for="">Upload Images</label>
                            </div>
                            <div class="col-8">
                                <input type="file" multiple name="file[]">
                                <p class="mt-4">
                                    <button class="btn btn-sm bg-navy" name="add">Submit</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gallery</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if(count($gallery) > 0){
                            foreach($gallery as $value){
                                ?>
                                <div class="col-3">
                                    <img src="<?=base_url("uploads/gallery/".$value->image)?>" class="img-thumbnail" alt="">
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
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