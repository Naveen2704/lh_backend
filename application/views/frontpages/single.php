<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="single-post-info-content text-center">
                <h1 class="blog-title"><?=$projectInfo->title?></h1>
            </div>
            <div class="row justify-content-around">
                <div class="col-10 text-center">
                    <div class="main-image-box my-5">
                        <?php
                        if(count($projectImages) > 0){
                            ?>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $i = 0;
                                    foreach($projectImages as $value){
                                        ?>
                                        <div class="carousel-item <?=($i==0)?'active':''?>">
                                            <img class="d-block w-100" src="<?=base_url('uploads/projects/'.$value->image)?>">
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <img src="<?=base_url('uploads/no-image.png')?>">
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="single-blog-post">
                
                <div class="author-quote-box">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="text">
                                <p><?=$projectInfo->short_description?></p>
                                <div class="name">
                                    <h3><?=$city->city_name?>, <span><?=$projectInfo->state?></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quote-bottom-text">
                    <p><?=$projectInfo->description?></p>
                </div>
            </div>
        </div>
    </div>
</div>