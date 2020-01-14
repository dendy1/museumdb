<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/public/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Museum</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="/public/css/linearicons.css">
    <link rel="stylesheet" href="/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/magnific-popup.css">
    <link rel="stylesheet" href="/public/css/nice-select.css">
    <link rel="stylesheet" href="/public/css/animate.min.css">
    <link rel="stylesheet" href="/public/css/owl.carousel.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/sweetalert2.css">
</head>
<body>

<header id="header" id="home">
    <div class="container header-top">
        <div class="row">
            <div class="col-6 top-head-left">
                <ul>
                    <?php if (isset($_SESSION['account'])): ?>

                        <?php if ($_SESSION['account']['role_id'] == 2): ?>
                            <li><a href="/admin">Admin Panel</a></li>
                        <?php endif ?>

                        <li><a href="/account/logout">Sign Out</a></li>

                    <?php else: ?>
                        <li><a href="/account/login">Sign In</a></li>
                        <li><a href="/account/register">Create an Account</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <div class="col-6 top-head-right">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="public/img/logo.png" alt="" title=""/></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->

<?php echo $content; ?>

<script src="/public/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="/public/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="/public/js/easing.min.js"></script>
<script src="/public/js/hoverIntent.js"></script>
<script src="/public/js/superfish.min.js"></script>
<script src="/public/js/jquery.ajaxchimp.min.js"></script>
<script src="/public/js/jquery.magnific-popup.min.js"></script>
<script src="/public/js/owl.carousel.min.js"></script>
<script src="/public/js/imagesloaded.pkgd.min.js"></script>
<script src="/public/js/justified.min.js"></script>
<script src="/public/js/jquery.sticky.js"></script>
<script src="/public/js/jquery.nice-select.min.js"></script>
<script src="/public/js/parallax.min.js"></script>
<script src="/public/js/mail-script.js"></script>
<script src="/public/js/main.js"></script>
<script src="/public/js/sweetalert2.all.js"></script>
<script src="/public/js/formpopup.js"></script>
</body>
</html>



