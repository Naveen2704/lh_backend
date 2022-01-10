 <!--Start services style2 Service Page-->
 <section class="services-style2-service-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="sec-title">
                    <p>Our Projects</p>
                    <div class="title">Associated <span>Projects</span></div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="text">
                    <p>We are an Interior Designer, Who believe in excellence, quality and honesty, yes we design beautiful home interiors.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Start single service style2-->
            <?php
            if(count($projects) > 0){
                $i = 0;
                foreach($projects as $value){
                    $images = $this->db->query("select * from project_images where project_id='".$value->project_id."'")->row();
                    if($images->image != ""){
                        $img = base_url("uploads/projects/".$images->image);
                    }
                    else{
                        $img = base_url("uploads/no-image.png");
                    }
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-service-style2 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1200ms">
                            <div class="img-holder">
                                <img src="<?=$img?>" alt="<?=$value->title?>">
                                <div class="overlay-style-two"></div>
                            </div>
                            <div class="text-holder">
                                <div class="icon-holder">
                                    <span class="icon-concept"></span>
                                </div>
                                <div class="inner">
                                    <h3><?=$value->title?></h3>
                                    <div class="text">
                                        <p><?=$value->short_description?></p>
                                    </div>
                                    <div class="read-more">
                                        <a class="btn-one" href="<?=base_url('Single/'.$value->project_id)?>">Read More<span class="flaticon-next"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
            }
            ?>
            
            <!--End single service style2-->
        </div>
    </div>
</section>
<!--End services style2 Service Page-->        