<style>
.note-editor.note-frame .note-editing-area .note-editable, .note-editor.note-airframe .note-editing-area .note-editable{
    height: 250px !important;
}
</style>
<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Privacy Policy Info</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-md-12">
                        <form method="post" action="<?=base_url("PrivacyPolicy/Add")?>" enctype="multipart/form-data" autocomplete="off">
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Title</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="title" id="title" value="<?=$services->title?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Description</label>
                                </div>
                                <div class="col-6">
                                    <textarea name="description" id="description" cols="30" rows="25" value="" style="height: 200px;" class="form-control"><?=$services->description?></textarea>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Image</label>
                                </div>
                                <div class="col-4">
                                    <input type="file" name="file" id="file" class="form-control">
                                    <?php
                                    if($services->image != ""){
                                        ?>
                                        <img src="<?=base_url('uploads/service/'.$services->image)?>" class="img-thumbnail">
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                &nbsp;
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-sm bg-navy" name="add">Submit</button>
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
    $('#description').summernote()
    $('#states').on("change", function(){
        var state = $(this).val();
        $.post("<?=base_url('Projects/getCities')?>",{"state": state},function(data){
            $('#city').html(data)
        });
    })
})
</script>