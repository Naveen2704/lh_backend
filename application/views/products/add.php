<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                    <a href="<?=base_url('Products')?>" class="btn btn-xs float-right bg-danger">Back To Products List</a>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('Products/Save')?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 bg-dark mb-2">
                                <h5 class="py-2 pl-2 m-0">Product Info</h5>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="title" required placeholder="Product Name" class="form-control" title="Product Title">
                            </div>
                            <div class="col-md-3 col-12 mb-3">
                                <label for="">Product Status</label>
                                <select name="product_status" required class="form-control">
                                    <option selected disabled>Select Status</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="coming_soon">Coming Soon</option>
                                    <option value="out_of_stock">Out of Stock</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-12 mb-3">
                                <label for="">Category</label>
                                <select name="category" required class="form-control">
                                    <option selected disabled >Select Category</option>
                                    <?php
                                    if(count($categories) > 0){
                                        foreach($categories as $value){
                                            ?>
                                            <option value="<?=$value->category_id?>"><?=$value->category_name?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="">Featured Image</label>
                                <p><input type="file" required name="featured_image"  ></p>
                            </div>
                            <div class="col-12 bg-dark mb-2">
                                <h5 class="py-2 pl-2 m-0">Artist Info</h5>
                            </div>
                            <div class="col-md-3 col-12 mb-3">
                                <label for="">Artist</label>
                                <select name="artist" required class="form-control" name="artist_id">
                                    <option selected disabled>Select Artist</option>
                                    <?php
                                    if(count($artists) > 0){
                                        foreach($artists as $value){
                                            ?>
                                            <option value="<?=$value->artist_id?>"><?=$value->artist_name?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 bg-dark mb-2">
                                <h5 class="py-2 pl-2 m-0">Variants
                                    <button class="btn btn-xs btn-danger float-right" type="button" id="addVariant">Add Variant</button>
                                </h5>
                            </div>
                            <div class="col-12">
                                <p class="m-0 mb-2">
                                    <small><i>(Note: Please enter quantities of different sizes seperated with comma (,) respectively )</i></small>
                                </p>
                                <input type="hidden" value="1" id="variants" name="variants">
                            </div>
                            <div class="col-12 variants_body">
                                <div class="row variant">
                                    <div class="col-md-1 col-12 mb-3">
                                        <label for="">Color</label>
                                        <input type="color" placeholder="Color" name="color_1" class="form-control">
                                    </div>
                                    <div class="col-md-1 col-12 mb-3">
                                        <label for="">Quantity</label>
                                        <input type="text" name="qty_1" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-12 mb-3 px-0">
                                        <label for="">Available Sizes</label>
                                        <p class="m-0 mt-2">
                                            <input type="checkbox" name="sizes_1[]" value="xs"> XS&nbsp;
                                            <input type="checkbox" name="sizes_1[]" value="s"> S&nbsp;
                                            <input type="checkbox" name="sizes_1[]" value="m"> M&nbsp;
                                            <input type="checkbox" name="sizes_1[]" value="l"> L&nbsp;
                                            <input type="checkbox" name="sizes_1[]" value="xl"> XL&nbsp;
                                            <input type="checkbox" name="sizes_1[]" value="xxl"> XXL&nbsp;
                                            <input type="checkbox" name="sizes_1[]" value="xxxl"> XXXL
                                        </p>
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label for="">Images</label>
                                        <p class="m-0 mt-1">
                                            <input type="file" name="additional_images_1[]" multiple="multiple" class="form-control">
                                        </p>
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label for="">Price</label>
                                        <input type="text" placeholder="Price" name="price_1" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label for="">Special Price</label>
                                        <input type="text" placeholder="Special Price" name="sp_price_1" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-1 mb-3 text-center">
                                        <p class="mt-4 pt-3">
                                            <a class="remove_variant" id="1"><i class="fas fa-trash"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="btn btn-success mt-3" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#products-list').DataTable();
        $('#addVariant').on("click", function(){
            var len = $('.variant').length;
            var i = parseInt(len) + 1;
            $('#variants').val(i)
            var str = '<div class="row variant"><div class="col-md-1 col-12 mb-3"><label for="">Color</label><input type="color" placeholder="Color" name="color_'+i+'" class="form-control" /></div><div class="col-md-1 col-12 mb-3"><label for="">Quantity</label><input type="text" name="qty_'+i+'" class="form-control"></div><div class="col-md-3 col-12 mb-3 px-0"><label for="">Available Sizes</label><p class="m-0 mt-2"><input type="checkbox" name="sizes_'+i+'[]" value="xs" />&nbsp;XS&nbsp;<input type="checkbox" name="sizes_'+i+'[]" value="s" />&nbsp;S&nbsp;<input type="checkbox" name="sizes_'+i+'[]" value="m" />&nbsp;M&nbsp;<input type="checkbox" name="sizes_'+i+'[]" value="l" />&nbsp;L&nbsp;<input type="checkbox" name="sizes_'+i+'[]" value="xl" />&nbsp;XL&nbsp;<input type="checkbox" name="sizes_'+i+'[]" value="xxl" />&nbsp;XXL&nbsp;<input type="checkbox" name="sizes_'+i+'[]" value="xxxl" />&nbsp;XXXL</p></div><div class="col-md-2 col-12 mb-3"><label for="">Images</label><p class="m-0 mt-1"><input type="file" name="additional_images_'+i+'[]" multiple="multiple"  /></p></div><div class="col-md-2 col-12 mb-3"><label for="">Price</label><input type="text" placeholder="Price" name="price_'+i+'" class="form-control" /></div><div class="col-md-2 col-12 mb-3"><label for="">Special Price</label><input type="text" placeholder="Special Price" name="sp_price_'+i+'" class="form-control" /></div><div class="col-12 col-md-1 mb-3 text-center"><p class="mt-4 pt-3"><a class="remove_variant" id="'+i+'"><i class="fas fa-trash"></i></a></p></div></div>';
            $('.variants_body').append(str)
        })


    })
</script>