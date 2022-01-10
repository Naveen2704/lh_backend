<div class="container-fluid">
    <div class="card card-navy card-tabs">
        <div class="card-header p-0 pt-1 text-center">
            <ul class="nav nav-tabs">
                <li class="nav-item active">
                    <a href="#general" class="nav-link active" data-toggle="pill">General Settings</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#application" class="nav-link" data-toggle="pill">Application Settings</a>
                </li> -->
                <li class="nav-item">
                    <a href="#payment" class="nav-link" data-toggle="pill">Payment Gateway Settings</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="tab-content" id="custom-tabs">
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="row">
                            <div class="col-md-5 col-12">
                                <form action="<?=base_url('Settings/addGeneral')?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Site Title</label>
                                        <input type="text" placeholder="Site Title" name="title" value="<?=$general->title?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Site Description</label>
                                        <textarea type="text" placeholder="Description" name="description" class="form-control" rows="3"><?=$general->description?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keywords</label>
                                        <textarea type="text" placeholder="Keywords (ex: good product, better product etc)" name="keywords" class="form-control" rows="5"><?=$general->keywords?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Genral Logo</label>
                                        <p><input type="file" name="general"></p>
                                        <p class="mt-2"><img id="generalImage" src="<?=base_url('uploads/logo/'.$general->logo_general)?>" alt="" width="100" ></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Dark Logo</label>
                                        <p><input type="file" name="dark"></p>
                                        <p class="mt-2"><img id="darkImage" alt="" src="<?=base_url('uploads/logo/'.$general->logo_dark)?>" width="100" ></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Theme Color</label>
                                        <p><input type="color" placeholder="Select Color" value="<?=$general->theme_color?>" name="color"></p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn bg-navy" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <div class="row">
                            <div class="col-md-5 col-12">
                                <div class="alert bg-light border">
                                    <p class="mb-0">
                                        These details are for only <b>Razorpay Payment Gateway</b>. if you need another gateway please <a href="mailto:nvnsoftsol@gmail.com" class="text-info" target="blank">contact us</a>.
                                    </p>
                                </div>
                                <form action="<?=base_url('Settings/addPayment')?>" method="post">
                                    <div class="form-group">
                                        <label for="">Key ID</label>
                                        <input type="text" placeholder="Key ID" value="<?=$payment->key_id?>" name="key_id" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Key Secret</label>
                                        <input type="text" placeholder="Key Secret" name="secret_id" value="<?=$payment->secret_id?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn bg-navy" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>