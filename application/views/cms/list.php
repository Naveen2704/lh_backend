<div class="container-fluid">
    <div class="card card-navy card-tabs">
        <div class="card-header p-0 pt-1 text-center">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#homepage" class="nav-link active" data-toggle="pill">Homepage CMS</a></li>
                <li class="nav-item"><a href="#about-us" class="nav-link" data-toggle="pill">About Us</a></li>
                <li class="nav-item"><a href="#sliders" class="nav-link" data-toggle="pill">Sliders</a></li>
                <!-- <li class="nav-item"><a href="#terms" class="nav-link" data-toggle="pill">Terms & Conditions</a></li> -->
                <li class="nav-item"><a href="#policies" class="nav-link" data-toggle="pill">Policies</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs">
                <div class="tab-pane fade show active" id="homepage" role="tabpanel" aria-labelledby="homepage-tab">
                    <form action="<?=base_url('CMS/homepageSave')?>" method="post">
                        <div class="form-group">
                            <label for="">Our Story</label>
                            <textarea value="" name="our_story" class="form-control desc" id="" cols="30" rows="5"><?=$our_story->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Feeding Creativity</label>
                            <textarea value="" name="feeding_creativity" class="form-control desc" id="" cols="30" rows="5"><?=$feeding_creativity->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Social Enterprise</label>
                            <textarea value="" name="social_enterprise" class="form-control desc" id="" cols="30" rows="5"><?=$social_enterprise->description?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-navy" name="save">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
                    <form action="<?=base_url('CMS/aboutSave')?>" method="post">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="<?=$about->title?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea value="" name="description" class="form-control desc" id="about_description" cols="30" rows="10"><?=$about->description?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-navy" name="save">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="sliders" role="tabpanel" aria-labelledby="sliders-tab">
                    <form action="<?=base_url('CMS/slidersSave')?>" method="post" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-md-3 text-right">
                                <label for="">Slider Title</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="slider_title" id="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 text-right">
                                <label for="">Description</label>
                            </div>
                            <div class="col-md-5">
                                <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 text-right">
                                <label for="">Image</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" name="file" id="">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 text-center">
                                <button class="btn bg-navy" name="sliders_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <?php
                        if(count($sliders) > 0){
                            foreach($sliders as $val){
                                ?>
                                <div class="col-md-3 mb-2">
                                    <div class="card">
                                        <img src="<?=base_url('uploads/sliders/'.$val->slider_image)?>" alt="" class="card-img-top">
                                        <div class="card-body p-1">
                                            <a href="<?=base_url('CMS/delSlider/'.$val->slider_id)?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-block btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="policies" role="tabpanel" aria-labelledby="policies-tab">
                    <form action="<?=base_url('CMS/policiesSave')?>" method="post">
                        <div class="form-group">
                            <label for="">Terms & Conditions</label>
                            <textarea name="terms" id="" cols="30" rows="10" class="form-control desc"><?=$terms->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Seller Policy</label>
                            <textarea name="seller" id="" cols="30" rows="10" class="form-control desc"><?=$seller->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Buyer Policy</label>
                            <textarea name="buyer" id="" cols="30" rows="10" class="form-control desc"><?=$buyer->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Cancellation Policy</label>
                            <textarea name="cancellation" id="" cols="30" rows="10" class="form-control desc"><?=$cancellation->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Return Policy</label>
                            <textarea name="return" id="" cols="30" rows="10" class="form-control desc"><?=$return->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Shipping & Refund Policy</label>
                            <textarea name="shipping" id="" cols="30" rows="10" class="form-control desc"><?=$shipping->description?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-navy">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function(){
        $('.desc').summernote({
            toolbar: false
        });
    });
</script> -->