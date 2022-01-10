<section class="content">
      <div class="container-fluid mt-4">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Add Categories</h4>
              <a href="<?php echo base_url('Categories'); ?>" class="btn btn-xs bg-purple float-right">Go Back to Categories</a>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                  <form method="POST" action="<?php echo base_url('Categories/save_categories'); ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Image</label>
                    <input type="file" class="form-control" name="category_image" placeholder="Enter Category Name">
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