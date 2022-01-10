<section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title" style="margin-top:10px;">Categories List</h3>
            
                <a href="<?=base_url('Categories/add_categories')?>" class="btn bg-purple btn-xs float-right">Add Branch</a> -->
                <div class="card-header">
            <h3 class="card-title">Categories List</h3>
            <a href="<?=base_url('Categories/add_categories')?>" class="btn bg-purple btn-xs float-right">Add Categories</a>
        </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">Category Name</th>
                      <th style="width: 20px">Image</th>
                      <th style="width: 20px">Action</th>
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
                                    <?php echo $categories->category_name; ?>
                                </td>
                                <td>
                                image
                                <!-- <img style="width:20%; border:1px solid #ccc; background: #f3f3f3;" src="<?php echo base_url('uploads/categories/'.$categories->category_image);?>" /> -->
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
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
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