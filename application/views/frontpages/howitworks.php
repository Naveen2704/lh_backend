<div class="container my-5">

        <div class="row ">
            <div class="col-xl-6">
                <div class="image-box">
                    <img src="<?=base_url('uploads/'.$workInfo->image)?>" alt="Awesome Image">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="how-works-content">
                    <h2 class="mb-3"><?=$workInfo->title?></h2>
                    <div class="w-100">
                    <?=$workInfo->description?>
                    </div>
                </div>
            </div>
        </div>

</div>