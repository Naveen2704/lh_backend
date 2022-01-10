<section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-md-8">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title" style="margin-top:10px;">Categories List</h3>
            
                <a href="<?=base_url('Categories/add_categories')?>" class="btn bg-purple btn-xs float-right">Add Branch</a> -->
                <div class="card-header">
                    <h3 class="card-title">Categories List</h3>
                    <!-- <a href="<?=base_url('Categories/add_categories')?>" class="btn bg-purple btn-xs float-right">Add Categories</a> -->
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>                  
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>No of Products</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $i=1;
                            foreach($categories_list as $categories){
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <div style="width:40px;height: 40px;overflow:hidden">
                                            <img style="object-fit: contain;width:100%;" src="<?php echo base_url('uploads/categories/'.$categories->image);?>" />
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <?php echo $categories->category_name; ?>
                                    </td>
                                    <td>
                                        <?=getCatProducts($categories->category_id)?>
                                        <a href="" class="float-right"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                    <td>
                                            <a href="<?php echo base_url('Categories/edit_category/'.$categories->category_id); ?>"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('Categories/delete_category/'.$categories->category_id)?>" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt deleteSmall" style="color:red"; aria-hidden="true"></i></a>
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
                        <h4 class="card-title">Add Categories</h4>
                        <!-- <a href="<?php echo base_url('Categories'); ?>" class="btn btn-xs bg-purple float-right">Go Back to Categories</a> -->
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12">
                            <form method="POST" action="<?php echo base_url('Categories/save_categories'); ?>" enctype="multipart/form-data">
                            <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Image</label>
                                <input type="file" class="" name="category_image" placeholder="Enter Category Name">
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
        <!-- Add categories Modal -->
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <div class="card-body">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" autocomplete="off" id="exampleInputEmail1" placeholder="Enter Category Name">
                  </div>
                </div>
 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Add Categories Modal -->
      </div><!-- /.container-fluid -->
    </section>