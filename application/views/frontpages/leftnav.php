<?php $page = $this->uri->segment(1); ?>
<div class="single-service-sidebar">
    <!--Start Single sidebar-->
    <div class="single-sidebar">
        <ul class="service-pages">
            <li class="<?=($page == 'Myaccount')?'active':''?>">
                <a href="<?=base_url('Myaccount')?>">
                    <div class="title">
                        <h3 class="static">My Works</h3>
                        <div class="overlay-title">
                            <h3>My Works</h3>
                        </div>
                    </div>
                </a>
            </li>
            <li class="<?=($page == 'OGuidance')?'active':''?>">
                <a href="<?=base_url('OGuidance')?>">
                    <div class="title">
                        <h3 class="static">Online Guidance</h3>
                        <div class="overlay-title">
                            <h3>Online Guidance</h3>
                        </div>
                    </div>
                </a>
            </li>
            <li class="<?=($page == 'GCodes')?'active':''?>">
                <a href="<?=base_url('GCodes')?>">
                    <div class="title">
                        <h3 class="static">Gift Codes</h3>
                        <div class="overlay-title">
                            <h3>Gift Codes</h3>
                        </div>
                    </div>
                </a>
            </li>
            <li class="<?=($page == 'CPacks')?'active':''?>">
                <a href="<?=base_url('CPacks')?>">
                    <div class="title">
                        <h3 class="static">Custom Packs</h3>
                        <div class="overlay-title">
                            <h3>Custom Packs</h3>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>