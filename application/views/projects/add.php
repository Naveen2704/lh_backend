<style>
.note-editor.note-frame .note-editing-area .note-editable, .note-editor.note-airframe .note-editing-area .note-editable{
    height: 250px !important;
}
</style>
<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Project</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-md-12">
                        <form method="post" action="<?=base_url("Projects/AddProject")?>" enctype="multipart/form-data" autocomplete="off">
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Title</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Short Description</label>
                                </div>
                                <div class="col-4">
                                    <textarea name="short_description" id="short_description" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Description</label>
                                </div>
                                <div class="col-6">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">State</label>
                                </div>
                                <div class="col-4">
                                    <select name="states" id="states" class="form-control" required>
                                        <option selected disabled>--Select State--</option>
                                        <?php
                                        if(count($states) > 0){
                                            foreach($states as $value){
                                                ?>
                                                <option value="<?=$value->city_state?>"><?=ucwords($value->city_state)?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">City</label>
                                </div>
                                <div class="col-4">
                                    <select name="city" id="city" class="form-control" required>
                                        <option selected disabled>--Select City--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 text-right">
                                    <label for="">Project Images</label>
                                </div>
                                <div class="col-4">
                                    <input type="file" name="file[]" multiple="multiple" class="custom-file-input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-right">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-4">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" checked name="status" value="1" id="checkboxPrimary2">
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