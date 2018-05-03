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
        <div class="swiper-slide" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=68&amp;txt=Slideshow+Image&amp;w=1920&amp;h=500);"></div>
    </div>
</div>
</div>
<div></div>
<?php if(isset($_GET['id_kom'])) { ?>
<div class="team-boxed">
    <div class="container">
        <div class="intro"></div>
        
            <?php 
            $namakom = "";
            $namaket = "";
            $desk = "";
            $jumlahang = "";
            $id_kom = $_GET['id_kom'];
            $sql1 = "SELECT nama_kom, nama_ket, deskripsi, jumlah_anggota FROM komunitas WHERE id_kom = '$id_kom'";
            $query1 = $conn->prepare($sql1);
            $neo1 = array(
                'nama_kom' => $namakom,
                'nama_ket' => $namaket,
                'deskripsi' => $desk,
                'jumlah_anggota' => $jumlahang
                );
            $query1->execute($neo1);
            while($row1 = $query1 -> fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="col-md-1 col-lg-10 item">
            <h2 class="text-center">Community</h2>
                <div class="box">
                    <div class="col-md-12"><img class="rounded-circle" src="assets/img/SS5.jpg"></div>
                    <h3 class="name"><?php echo $row1['nama_kom']; ?></h3>
                    <p class="description">
                        <?php echo $row1['deskripsi']; ?>
                    </p>
                    <div class="social"><i class="fa fa-user"></i><span style="margin:0px 13px;"><?php echo $row1['nama_ket']; ?></span></div>
                    <div class="social"><i class="fa fa-user"></i><span style="margin:0px 13px;"><?php echo $row1['jumlah_anggota']; ?> orang</span></div>
                    <table border="1"> 
                    <thead>
                        <td>No</td>
                        <td>Nama Event</td>
                        <td>Tanggal</td>
                        <td>Tempat</td>
                        <td>Deskripsi</td>
                    </thead>
                    <?php 
                    $nama_event = "";
                    $tanggal = "";
                    $tempat = "";
                    $deskripsi = "";
                    $sql2 = "SELECT nama_event, tanggal, tempat, deskripsi FROM event WHERE id_kom = '$id_kom'";
                    $query2 = $conn->prepare($sql2);
                    $neo2 = array(
                        'nama_event' => $nama_event,
                        'tanggal' => $tanggal,
                        'tempat' => $tempat,
                        'deskripsi' => $deskripsi
                        );
                    $query2->execute($neo2); 
                    $i = 1;
                    while($row2 = $query2 -> fetch(PDO::FETCH_ASSOC)){  ?>
                    <tr>
                        <td><?php echo $i; $i++ ?></td>
                        <td><?php echo $row2['nama_event']; ?></td>
                        <td><?php echo $row2['tanggal']; ?></td>
                        <td><?php echo $row2['tempat']; ?></td>
                        <td><?php echo $row2['deskripsi']; ?></td>
                    </tr>
                    <?php } ?>
                    </table>
                </div>
            </div>
            <?php } ?>
    </div>
</div>
<?php } else { ?>
<div class="team-boxed">
    <div class="container">
        <div class="intro"></div>
        <h2 class="text-center">Community</h2>
        <div class="row people" style="padding:0px;">
            <?php 
            $namakom = "";
            $namaket = "";
            $desk = "";
            $jumlahang = "";
            $id_kom = "";
            $sql = "SELECT nama_kom, nama_ket, deskripsi, jumlah_anggota, id_kom FROM komunitas";
            $query = $conn->prepare($sql);
            $neo = array(
                'nama_kom' => $namakom,
                'nama_ket' => $namaket,
                'deskripsi' => $desk,
                'jumlah_anggota' => $jumlahang,
                'id_kom' => $id_kom
                );
            $query->execute($neo);
            while($row = $query -> fetch(PDO::FETCH_ASSOC)){ 
            ?>
            <div class="col-md-6 col-lg-4 item">
                <div class="box">
                    <div class="col-md-12"><img class="rounded-circle" src="assets/img/SS5.jpg"></div>
                    <a href="community.php?id_kom=<?php echo $row['id_kom']; ?>"><h3 class="name"><?php echo $row['nama_kom']; ?></h3></a>
                    <p class="description">
                        <?php echo $row['deskripsi']; ?>
                    </p>
                    <div class="social"><i class="fa fa-user"></i><span style="margin:0px 13px;"><?php echo $row['nama_ket']; ?></span></div>
                    <div class="social"><i class="fa fa-user"></i><span style="margin:0px 13px;"><?php echo $row['jumlah_anggota']; ?> orang</span></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="assets/js/Simple-Slider1.js"></script>
</body>
</html>
