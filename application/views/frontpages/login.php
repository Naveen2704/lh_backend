<section class="breadcrumb-area style2" style="background-image: url(<?=base_url('front-assets/images/resources/breadcrumb-bg-2.jpg')?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content-box clearfix">
                    <div class="title-s2 text-center">
                        <span>Login / Register</span>
                        <h1>That Perfectly Fits Your Life</h1>
                    </div>
                    <div class="breadcrumb-menu float-left">
                        <ul class="clearfix">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li class="active">Login/Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout-area pt-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="form billing-info">
                    <div class="shop-page-title">
                        <div class="title">Login</div>
                    </div>
                    <form method="post" action="<?=base_url('Login')?>" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-label">Email*</div>
                                <div class="field-input">
                                    <input type="email" name="email" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Password*</div>
                                <div class="field-input">
                                    <input type="password" name="password" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn-one" name="login">Submit<span class="flaticon-next"></span></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form billing-info">
                    <div class="shop-page-title">
                        <div class="title">Register</div>
                    </div>
                    <form method="post" action="<?=base_url('Register')?>" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-label">Name*</div>
                                <div class="field-input">
                                    <input type="text" name="name" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Email*</div>
                                <div class="field-input">
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Mobile No.*</div>
                                <div class="field-input">
                                    <input type="text" name="mobile" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Password*</div>
                                <div class="field-input">
                                    <input type="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn-one" name="register">Submit<span class="flaticon-next"></span></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>