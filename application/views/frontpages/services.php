<div class="container my-5">

        <div class="row ">
            <div class="col-xl-6">
                <div class="image-box">
                    <img src="<?=base_url('uploads/service/'.$servicesInfo->image)?>" alt="Awesome Image">
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <?php
                        if(isset($_SESSION['customer_id'])){
                            ?>
                            <a href="<?=base_url('Myform')?>" class="btn-block btn-one">MYSELF<span class="flaticon-next"></span></a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="<?=base_url('Login')?>" class="btn-block btn-one">MYSELF<span class="flaticon-next"></span></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                        if(isset($_SESSION['customer_id'])){
                            ?>
                            <a href="<?=base_url('Myform')?>" class="btn-block btn-one">GENERATE CODE<span class="flaticon-next"></span></a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="<?=base_url('Login')?>" class="btn-block btn-one">GENERATE CODE<span class="flaticon-next"></span></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="how-works-content">
                    <h2 class="mb-3"><?=$servicesInfo->title?></h2>
                    <div class="w-100">
                    <?=$servicesInfo->description?>
                    </div>
                </div>
            </div>
        </div>

</div>