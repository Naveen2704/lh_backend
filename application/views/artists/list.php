<style>
    .artistEdit:hover{
        cursor: pointer;
    }
</style>
<section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-md-8">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title" style="margin-top:10px;">Categories List</h3>
            
                <a href="<?=base_url('Categories/add_categories')?>" class="btn bg-purple btn-xs float-right">Add Branch</a> -->
                <div class="card-header">
                    <h3 class="card-title">Artists List</h3>
                    <!-- <a href="<?=base_url('Artists/add_artist')?>" class="btn bg-purple btn-xs float-right">Add Categories</a> -->
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>                  
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Artist Name</th>
                        <th>Description</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $i=1;
                            foreach($artists as $val){
                                $data = $val;
                                $data->description = str_replace("'"," ",$val->description);
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <div style="width:40px;height: 40px;overflow:hidden">
                                            <img style="object-fit: contain;width:100%;" src="<?php echo base_url('uploads/artists/'.$val->artist_image);?>" />
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <?php echo $val->artist_name; ?>
                                    </td>
                                    <td>
                                        <?=$val->description?>
                                    </td>
                                    <td>
                                        <a class="artistEdit" data-value='<?=json_encode($data)?>'><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <a href="<?php echo base_url('Artists/delete_artist/'.$val->artist_id)?>" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt deleteSmall" style="color:red"; aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
            <!-- /.card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add/Modify Artist</h4>
                        <!-- <a href="<?php echo base_url('Categories'); ?>" class="btn btn-xs bg-purple float-right">Go Back to Categories</a> -->
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="<?php echo base_url('Artists/add_artist'); ?>" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="type" id="type" value="New">
                                            <input type="hidden" name="artist_id" id="artist_id">
                                            <label for="exampleInputEmail1">Artist Name</label>
                                            <input type="text" class="form-control" id="artist_name" name="artist_name" placeholder="Enter Artist Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Artist Video Link</label>
                                            <input type="text" class="form-control" id="artist_video_link" name="artist_video_link" placeholder="Video Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea class="form-control" name="description" id="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Artist Image</label>
                                            <input type="file" class="" id="artist_image" name="artist_image" placeholder="Enter Category Name">
                                            <p class="mt-2"><img id="ArtImage" alt="" width="60" height="60"></p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <script>
        $(document).ready(function(){
            $('.artistEdit').on("click", function(){
                var data = $(this).attr('data-value');
                console.log(JSON.parse(data))
                data = JSON.parse(data)
                console.log(data)
                console.log('<?=base_url('uploads/artists/')?>' + data.artist_image)
                $('#type').val("Old")
                $('#artist_id').val(data.artist_id)
                $('#artist_name').val(data.artist_name)
                $('#artist_video_link').val(data.video_link)
                $('#description').val(data.description)
                $('#ArtImage').attr('src', '<?=base_url('uploads/artists/')?>' + data.artist_image);
            });
        })
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ArtImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#artist_image").change(function(){
            readURL(this);
        });
    </script>