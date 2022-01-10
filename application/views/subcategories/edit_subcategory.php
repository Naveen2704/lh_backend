<section class="content">
      <div class="container-fluid mt-4">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Edit <?php echo $category_data->category_name;?> Category</h4>
              <a href="<?php echo base_url('Categories'); ?>" class="btn btn-xs bg-purple float-right">Go Back to Categories</a>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                  <form method="POST" action="<?php echo base_url('Categories/save_edit_categories/'.$category_data->category_id); ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="<?php echo $category_data->category_name;?>" placeholder="Enter Category Name">
                  </div>

                  <div class="form-group">
                    <label>Category Image<span class="mandatory">*</span></label>
                    <div class="fileinput-new" data-provides="fileinput" style="padding-top:0px !important; padding-left: 0px !important">
                      <div class="fileinput-preview text-center" data-trigger="fileinput" style="padding-left: 0px !important; padding-top:0px !important;"><img style="width:100%; border:1px solid #ccc; background: #f3f3f3; margin-bottom: 5px" src="<?php echo base_url('uploads/categories/'.$category_data->category_image);?>" /></div>
                      <input type="file" name="category_image" value="<?= $category_data->category_image; ?>" class="form-control" accept="image/x-png,image/jpeg" >
                  </div>
                </div>
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                  </div>
              </div>
          </div>
      </div>
   
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>