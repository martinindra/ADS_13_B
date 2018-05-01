<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
    <link rel="stylesheet" href="assets/css/Team-Grid.css">
</head>

<body>
    <div class="article-list">
        <div class="container">
            <?php
                if(isset($_SESSION['user'])) { ?>
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php">SIWisKom</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="community.php">Community</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="event.php">Event</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="aboutus.php">About Us</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label>
                                <input class="form-control search-field" type="search" name="search" placeholder="Search" id="search-field">
                            </div>
                        </form>
                        <a class="nav-link" href="aboutus.php">HAI, <?php echo($_SESSION['user']); ?></a>
                        <a class="btn btn-light action-button" role="button" href="logout.php">LOGOUT</a>
                        </div>
                    </div>
                </nav>

            <?php } else { ?>
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php">SIWisKom</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="community.php">Community</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="event.php">Event</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="aboutus.php">About Us</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label>
                                <input class="form-control search-field" type="search" name="search" placeholder="Search" id="search-field">
                            </div>
                        </form>
                        <a class="btn btn-light action-button" role="button" href="login.php">LOGIN</a>
                        <a class="btn btn-light action-button" role="button" href="register.php" style="background-color:rgb(154,174,213);color:rgb(0,0,0);">REGISTER</a>
                    </div>
                </div>
            </nav>

         <?php } ?>
            <div class="intro">
                <p class="text-center">Sistem Informasi Wisata Komunitas. Merupakan sebuah sistem informasi yang berisi informasi dari kegiatan dan komunitas di suatu daerah</p>
            </div>
        </div>
    </div>
    <div class="simple-slider">
        <div class="swiper-container" style="background-repeat:repeat-x;height:507px;">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/SS1.jpg&quot;);width:990px;height:388px;"></div>
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/SS2.jpg&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/SS3.jpg&quot;);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>