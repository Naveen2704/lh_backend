<!--Start breadcrumb area-->
<section class="breadcrumb-area style2" style="background-image: url(<?=base_url('front-assets/images/resources/breadcrumb-bg-2.jpg')?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content-box clearfix">
                    <div class="title-s2 text-center">
                        <h1>My Works</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->
<div class="container mt-5">
    <div class="row mb-5">
        <div class="col-md-4">
            <?=$this->load->view('frontpages/leftnav')?>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if(count($forms) > 0){
                        foreach($forms as $value){
                            if($value->status == 0){
                                $status = "Waiting For Approval";
                            }
                            elseif($value->status == 1){
                                $status = "Approved By Manager. Work In Progress";
                            }
                            elseif($value->status == 2){
                                $status = "Work Completed";
                            }
                            ?>
                            <div class="author-box-holder p-3 mt-0 mb-2">
                                <div class="inner-box">
                                    <div class="text">
                                        <h3>Application Number : <span><?=$value->application_number?></span></h3>
                                        <h3>
                                            <span>Project Type : <?=ucwords($value->project_type)?></span>&emsp;&emsp;&emsp;
                                            <span>Looking For : <?=ucwords($value->looking_for)?></span>
                                        </h3>
                                        <h3>
                                            <span>Project Style : <?=ucwords($value->project_style)?></span>&emsp;&emsp;&emsp;
                                            <span>Budget : <?=ucwords($value->budget)?></span>
                                        </h3>
                                        <p class="text-dark" style="margin: 2px 2px !important">Message</p>
                                        <p style="margin: 4px 2px !important"><?=$value->message?></p>
                                        <div class="author-social-links">
                                            <p>Referral Code :</p>
                                            <ul class="fix">
                                                <li><?=$value->referral_code?></li>
                                            </ul>
                                            <p>&emsp;&emsp;Executive Code :</p>
                                            <ul class="fix">
                                                <li><?=$value->executive_code?></li>
                                            </ul><br>
                                            <p>Work Status :</p>
                                            <ul class="fix">
                                                <li><?=$status?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="author-box-holder p-3 mt-0 mb-2">
                                <div class="inner-box">
                                    <div class="text">
                                        <h3>Application Number : <span><?=$value->application_number?></span></h3>
                                        <h3>
                                            <span>Project Type : <?=ucwords($value->project_type)?></span>&emsp;&emsp;&emsp;
                                            <span>Looking For : <?=ucwords($value->looking_for)?></span>
                                        </h3>
                                        <h3>
                                            <span>Project Style : <?=ucwords($value->project_style)?></span>&emsp;&emsp;&emsp;
                                            <span>Budget : <?=ucwords($value->budget)?></span>
                                        </h3>
                                        <p class="text-dark" style="margin: 2px 2px !important">Message</p>
                                        <p style="margin: 4px 2px !important"><?=$value->message?></p>
                                        <div class="author-social-links">
                                            <p>Referral Code :</p>
                                            <ul class="fix">
                                                <li><?=$value->referral_code?></li>
                                            </ul>
                                            <p>&emsp;&emsp;Executive Code :</p>
                                            <ul class="fix">
                                                <li><?=$value->executive_code?></li>
                                            </ul><br>
                                            <p>Work Status :</p>
                                            <ul class="fix">
                                                <li><?=$status?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="author-box-holder p-3 mt-0 mb-2">
                                <div class="inner-box">
                                    <div class="text">
                                        <h3>Application Number : <span><?=$value->application_number?></span></h3>
                                        <h3>
                                            <span>Project Type : <?=ucwords($value->project_type)?></span>&emsp;&emsp;&emsp;
                                            <span>Looking For : <?=ucwords($value->looking_for)?></span>
                                        </h3>
                                        <h3>
                                            <span>Project Style : <?=ucwords($value->project_style)?></span>&emsp;&emsp;&emsp;
                                            <span>Budget : <?=ucwords($value->budget)?></span>
                                        </h3>
                                        <p class="text-dark" style="margin: 2px 2px !important">Message</p>
                                        <p style="margin: 4px 2px !important"><?=$value->message?></p>
                                        <div class="author-social-links">
                                            <p>Referral Code :</p>
                                            <ul class="fix">
                                                <li><?=$value->referral_code?></li>
                                            </ul>
                                            <p>&emsp;&emsp;Executive Code :</p>
                                            <ul class="fix">
                                                <li><?=$value->executive_code?></li>
                                            </ul><br>
                                            <p>Work Status :</p>
                                            <ul class="fix">
                                                <li><?=$status?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <h4 class="text-center">No Records Found</h4>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>