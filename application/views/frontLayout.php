
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from st.ourhtmldemo.com/new/Crystalo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 May 2021 14:42:58 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Home One || Crystalo || Responsive HTML 5 Template</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- master stylesheet -->
    <link rel="stylesheet" href="<?=base_url('front-assets')?>/css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="<?=base_url('front-assets')?>/css/responsive.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('front-assets')?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?=base_url('front-assets')?>/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?=base_url('front-assets')?>/images/favicon/favicon-16x16.png" sizes="16x16">

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="<?=base_url('front-assets')?>/http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="<?=base_url('front-assets')?>/js/html5shiv.js"></script>
    <![endif]-->
    <style>
    .btn{
        /* text-transform: uppercase !important; */
    }
    .card-title{
        text-transform: uppercase !important;
        font-weight: 700 !important;
    }
    .badge{
        font-weight: 500 !important;
    }
    .checkout-area .form form .field-input input[type="text"],input[type="password"],input[type="email"]{
        position: relative;
        display: block;
        border: 1px solid #ededed;
        color: #848484;
        font-size: 15px;
        height: 48px;
        margin-bottom: 25px;
        padding: 0 15px;
        width: 100%;
        border-radius: 0px;
        transition: all 500ms ease;
    }

    .single-service-sidebar:before{
        top: 0px;
        content: none;
    }

    </style>

</head>

<body>
    <div class="boxed_wrapper">

        <!-- <div class="preloader"></div> -->

        <!-- Start Top Bar style1 -->
        <section class="top-bar-style1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="top-style1 clearfix">
                            <p>Crystalo Inspiring Interiors, 
                            <?php
                            if(isset($_SESSION['customer_id']) != ""){
                                ?>
                                <a href="<?=base_url('Myaccount')?>">Go to My Account</a>&emsp;
                                <a href="<?=base_url('Logout')?>">Logout</a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="<?=base_url('Login')?>">Login/Signup</a>
                                <?php
                            }
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Top Bar style1 -->

        <!--Start Main Header-->
        <header class="main-header header-style1">

            <div class="header-upper-style1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="inner-container clearfix">
                                <div class="logo-box-style1 float-left">
                                    <a href="index.html">
                                        <img src="<?=base_url('front-assets')?>/images/resources/logo.png" alt="Awesome Logo">
                                    </a>
                                </div>
                                <div class="main-menu-box float-right">
                                    <nav class="main-menu clearfix">
                                        <div class="navbar-header clearfix">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        </div>
                                        <div class="navbar-collapse collapse clearfix">
                                            <ul class="navigation clearfix">
                                                <li><a href="<?=base_url()?>">Home</a></li>
                                                <li><a href="<?=base_url('OurServices')?>">Services</a></li>
                                                <li><a href="<?=base_url('OnlineGuidance')?>">Online Guidance</a></li>
                                                <li><a href="<?=base_url('AssociatedProjects')?>">Associated Projects</a></li>
                                                <li><a href="<?=base_url('LearnMore')?>">Learn More</a></li>
                                                <li><a href="<?=base_url('HowItWorks')?>">How It Works</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="header-lower-style1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="inner-content clearfix">
                                <ul class="header-contact-info float-left">
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-maps-and-location"></span>
                                            </div>
                                            <div class="text">
                                                <h3>Newyork, USA</h3>
                                                <p>Flat 201, Reynolds Neck Str</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-phone"></span>
                                            </div>
                                            <div class="text">
                                                <h3>+324 123 45 978</h3>
                                                <p>Mon - Friday: 9.00 to 18.00</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-mail"></span>
                                            </div>
                                            <div class="text">
                                                <h3>support@mailus.com</h3>
                                                <p>Get a Free Quote</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="header-social-links-style1 float-right">
                                    <li class="wow slideInUp" data-wow-delay="0ms" data-wow-duration="1200ms">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="wow slideInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="wow slideInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </header>
        <!--End Main Header-->

    <div class="container-fluid p-0">
      <?php 
      if($this->session->flashdata('msg') != '')
      {
        ?>
        <div class="container mt-3">
          <div class="row">
            <div class="col-12">
              <div class="alert flash-msg <?=$this->session->flashdata('type')?>">
                <p class="m-0"><?=$this->session->flashdata('msg')?></p>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
      <?php $this->load->view($view); ?>
    </div>
    <!--Start footer area Style4-->
    <footer class="footer-area style4">
            <div class="container">
                <div class="row">
                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-footer-widget marbtm50-s4">
                            <div class="our-info-box">
                                <div class="text">
                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the blinded by desiremoment.</p>
                                </div>
                                <div class="follow-us-social-links clearfix">
                                    <span>Follw Us On:</span>
                                    <ul>
                                        <li><a href="#">Facebook</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="single-footer-widget s4">
                            <div class="title-style2">
                                <h3>Usefull Links</h3>
                            </div>
                            <div class="usefull-links">
                                <ul class="float-left">
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Online Guidance</a></li>
                                    <li><a href="#">Associated Projects</a></li>
                                    <li><a href="#">Learn More</a></li>
                                    <li><a href="#">How It Works</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12">
                        <div class="single-footer-widget pdtop50-s4">
                            <div class="title-style2">
                                <h3>Subscribe Us</h3>
                            </div>
                            <div class="subscribe-box">
                                <form class="subscribe-form" action="#">
                                    <input type="email" name="email" placeholder="Your Email">
                                    <button class="btn-one" type="submit">Subscribe<span class="flaticon-next"></span></button>
                                </form>
                                <div class="text">
                                    <p><span>*</span>Subscribe us and get latest news and updates</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                </div>
            </div>
        </footer>
        <!--End footer area style4-->

        <!--Start Footer Contact Info Area-->
        <section class="footer-contact-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="footer-contact-info clearfix">
                            <li>
                                <div class="single-footer-contact-info">
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-global"></span>
                                        </div>
                                        <div class="text">
                                            <p>Flat 20, Reynolds Neck, North<br> Helenaville, FV77 8WS</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-footer-contact-info">
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-support1"></span>
                                        </div>
                                        <div class="text">
                                            <p>+324 123 45 978 & 01<br> <span>Mon - Friday:</span> 9.00am to 6.00pm</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-footer-contact-info">
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-shipping-and-delivery"></span>
                                        </div>
                                        <div class="text">
                                            <p>support@crystalo.com<br> crystalocareer@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End Footer Contact Info Area-->

        <!--Start footer bottom area-->
        <section class="footer-bottom-area style3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="copyright-text text-center">
                            <p>© 2021 All Rights Reserved </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->


    <div class="scroll-to-top-style2 scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>



    <script src="<?=base_url('front-assets')?>/js/jquery.js"></script>
    <script src="<?=base_url('front-assets')?>/js/appear.js"></script>
    <script src="<?=base_url('front-assets')?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/isotope.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.bootstrap-touchspin.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.countTo.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.easing.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.enllax.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.fancybox.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.mixitup.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/jquery.paroller.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/owl.js"></script>
    <script src="<?=base_url('front-assets')?>/js/validation.js"></script>
    <script src="<?=base_url('front-assets')?>/js/wow.js"></script>
    
    <script src="<?=base_url('front-assets')?>/js/map-helper.js"></script>

    <script src="<?=base_url('front-assets')?>/assets/language-switcher/jquery.polyglot.language.switcher.js"></script>
    <script src="<?=base_url('front-assets')?>/assets/timepicker/timePicker.js"></script>
    <script src="<?=base_url('front-assets')?>/assets/html5lightbox/html5lightbox.js"></script>

    <!--Revolution Slider-->
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?=base_url('front-assets')?>/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?=base_url('front-assets')?>/js/main-slider-script.js"></script>

    <!-- thm custom script -->
    <script src="<?=base_url('front-assets')?>/js/custom.js"></script>



</body>

</html>