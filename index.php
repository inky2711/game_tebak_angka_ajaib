<?php 
    session_start();
    require'konek.php';

    if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
    } 

    $query = "SELECT * FROM user WHERE id_user = 9999";

    if (isset($_POST['cari'])) {
      $keyword = $_POST['ky'];
      $query = "SELECT * FROM user WHERE nama LIKE '%$keyword%' LIMIT 5";
    }


    $user = mysqli_query($kon, $query);
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Index Of INGKAY</title>
    <style type="text/css">
      .aku {
        width: 100px;
        height: 100px;
        float: left;
        border-radius: 50%;
        margin-bottom: 100px;
      }
      .kamu {
        line-height: 100px;
        float: left;
        margin-left: 30px;
      }
      .garis {
        display: block;
        width: 100%;
        height: 3 px;
        background-color: white;
      }
      #subject {
        width: 400px;
        height: 100px;
      }
      .ky {
        width: 25%;
        background-color: rgba(0,0,0,0.1);
        border: none;
        color: white;
        padding-left: 5px;
      }
      .nn {
        letter-spacing: 2px;
        color: white;
      }
      .game {
        display: block;
        width: 100px;
        height: 100px;
      }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="page">
    <nav id="colorlib-main-nav" role="navigation">
      <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
      <div class="js-fullheight colorlib-table">
        <div class="img" style="background-image: url(images/darkness.png);"></div>
        <div class="colorlib-table-cell js-fullheight">
          <div class="row no-gutters">
            <div class="col-md-12 text-center">
              <h1 class="mb-4"><a  class="logo">INGK<span>AY</span></a></h1>
              <ul>
                <li class="active"><a href="index.php"><span>Home</span></a></li>
                <li><a href="about.php"><span>About</span></a></li>
                <li><a href="beranda.php"><span>beranda</span></a></li>
                <li><a href="edit.php"><span>Edit Profil</span></a></li>
                <li><a href="logout.php"><span>Log out</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <div id="colorlib-page">
      <header>
        <div class="container">
          <div class="colorlib-navbar-brand">
            <img class="aku" src="<?= $_SESSION['poto'] ?>" id='atas'><h1 class="kamu"><a href="bio.php?id=<?= $_SESSION['id'] ?>" style="color:#fff"><?= $_SESSION['username']?></a></h1>
          </div>
          <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        </div>
      </header>


	    <div class="slider-item =js-fullheight">
		      	<div class="overlay"></div>
		        <div class="container">
		          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
		          	<div class="one-third order-md-last img" style="background-image:url(images/work-1.jpg);">
		          		<div class="overlay"></div>
		          	</div>
			          <div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
			          	<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
		    					</a>
			          	<div class="text">
                    
                    <br><br>
                    <form action="" method="post">
                      <input type="text" name="ky" placeholder="Masukan Nama Pengguna" class="ky" autocomplete="off" id="ky"><button type="submit" name="cari"><span class="icon-search"></span></button>
                    </form>
                    <div class="ajax">
                    <?php foreach ($user as $key) :?>
                      <div class="user" id="user">
                        &nbsp &nbsp &nbsp &nbsp<a href="bio.php?id=<?= $key['id_user'] ?>" class='nn'><?= $key['nama'] ?></a>
                      </div>
                    <?php endforeach ?>
                    <br>
                    <br><!-- 
                    <a href="game.php"><img src="images/darkness.png" class="game">
                    <p>Tebak Angka</p></a> -->
                    </div>
			            </div>
			          </div>
		        	</div>
		        </div>
		      </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>