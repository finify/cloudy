<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C6XFYS5PNM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-C6XFYS5PNM');
</script>
    <meta charset="UTF-8">
    <meta name="propeller" content="b2052172fd7003032c18e8950629aeb7">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->  
    <title><?= $this->siteTitle ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?=PROOT?>assets/img/mic.png">

    <link rel="stylesheet" href="<?=PROOT?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/animate.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css//audioplayer.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/classy-nav.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/one-music-icon.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/owl.carousel.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?=PROOT?>assets/style.css">
    <style>
        #searchInput{
            width: 100%;
            padding: 18px;
            font-size:20px;
        }

        #rrr{
          width:500px;
          border: 10px solid red;
        }

        #searchInput:focus{
            outline: none;
        }

        #inputBtn{
            padding: 5px 90px;
            margin-top: 20px;
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            transition: 0.7s;
            font-size:30px;
        }
        #inputBtn:hover{
            background-color: #fff;
            color: #000;
            cursor: pointer;
        }

        @media (max-width: 320px) {
            #searchInput{
            width: 100%;
            padding: 10px;
        }
            #inputBtn{
                padding: 8px 45px;
            }
        }
        .lYpBt{
          display:none;
        }
    </style>
   
    <?= $this->content('head');?>
    
    
</head>



<body>
    <!-- Preloader -->
    <!-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="https://cloudymic.com" class="nav-brand"><img src="<?=PROOT?>assets/img/cloudymic.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="https://cloudymic.com">Home</a></li>
                                    <li><a href="https://cloudymic.com/home/about">About</a></li>
                                    <li><a href="https://cloudymic.com/home/privacy">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <?= $this->content('body');?>

    
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <a href="#"><img src="<?= PROOT?>assets/img/cloudymic.png" alt="" style="width: 150px;"></a>
                    <p class="copywrite-text"><a href="#">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://finifytech.com" target="_blank">Finify Technologies</a>
</p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="<?= PROOT.'/'?>">Home</a></li>
                            <li><a href="https://cloudymic.com/home/about">About</a></li>
                            <li><a href="https://cloudymic.com/home/privacy">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->
    
    
    


    
    
    
    
    
    
    
    <!-- jQuery-2.2.4 js -->
    <script src="<?= PROOT?>assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= PROOT?>assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= PROOT?>assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?= PROOT?>assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= PROOT?>assets/js/active.js"></script>

    <script>
      $("#lyrics_div a").removeAttr("href");
      $("#about_div a").removeAttr("href");
      $("#about_div1 a").removeAttr("href");
      $("#about_div button").hide();
      $("#about_div1 button").hide();
    </script>
    
    
</body>

</html>
