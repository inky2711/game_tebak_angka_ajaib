<?php 
    session_start();
    require'konek.php';

    if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
    }

    if (isset($_POST['kirim'])) {
    	if( posting($_POST) > 0 ) {
		echo "
			<script>
				alert('Sucsess');
				document.location.href = 'beranda.php';
			</script>
			";
		} else {
		echo "
			<script>
				alert('Gagal Posting');
				document.location.href = 'beranda.php';
			</script>
		";
		}
    }

    $posting = mysqli_query($kon, "SELECT * FROM posting ORDER BY rand() LIMIT 15");
 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Beranda-INGKAY</title>
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
    		height: 3px;
    		background-color: white;
    	}
    	#subject {
    		width: 400px;
    		height: 100px;
    	}
    	.back {
    		background-color: rgba(255, 255, 255, 0.1);
    	}
    	.komen {
    		color: white;
    		font-size: 40px;
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
                <li><a href="index.php"><span>Home</span></a></li>
                <li><a href="about.php"><span>About</span></a></li>
                <li class="active"><a href="beranda.php"><span>beranda</span></a></li>
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

      <section class="hero-wrap">
      	<div class="overlay"></div>
	      <div class="container-fluid px-0">
	        <div class="row no-gutters text align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-12 ftco-animate text-center">
	            
	          </div>
	        </div>
	      </div>
      </section>

      <section class="ftco-section ftco-no-pt">
	      <div class="container">
	        <div class="row d-flex justify-content-center">
	          <div class="col-md-10 text-center d-flex ftco-animate">
	          	<div class="blog-entry justify-content-end">
	          	  <h1 class="bread">What Do You Think Now!!</h1>
	            <br>
	            <center>
	            	<form action="" method="post" enctype="multipart/form-data">
	            		<table>
	            			<tr>
	            				<td><label for="judul">Title</label></td>
	            				<td>:</td>
	            				<td><input type="text" name="judul" id="judul" autocomplete="off" required=""></td>
	            			</tr>
	            			<tr>
	            				<td><label for="subject">Subject</label></td>
	            				<td>:</td>
	            				<td><textarea name="isi" id="subject"></textarea></td>
	            			</tr> 
	            			<tr>
	            				<td><label for="gambar">Image</label></td>
	            				<td>:</td>
	            				<td><input type="file" name="gambar" id="gambar" autocomplete="off" ></td>
	            			</tr>	
	            			<tr>
	            				<td></td>
	            				<td></td>
	            				<td><button name="kirim">Kirim</button></td>
	            			</tr>
	            		</table>
	            	</form>
	            </center>
	            </div>
	            </div>
	          </div>
	        </div>
	      </div>
	      <hr class="garis">
	    </section>

	    <?php foreach ($posting as $key ) :?>
	    <hr class="garis">
	    	<div class="back">
      <section class="ftco-section ftco-no-pt">
	      <div class="container">
	        <div class="row d-flex justify-content-center">
	          <div class="col-md-10 text-center d-flex ftco-animate">
	          	<div class="blog-entry justify-content-end">
	          	  <img class="aku" src="<?= $key['image'] ?>"></img><h1 class="kamu"><a href="bio.php?id=<?= $key['id_user'] ?>"><?= $key['nama'] ?></a></h1>
	              <a class="block-20 img" style="background-image: url('<?= $key['gambar'] ?>');">
	              </a>
	              <div class="text pt-4 px-md-5">
	              	<div class="meta mb-3">
	                  <div><?= $key['tanggal'] ?></div>
	                </div>
	                <h3 class="heading mt-2"><a><?= $key['judul'] ?></a></h3>
	                <p><?= $key['isi'] ?></p>
	                <br>
	                <!-- <a href="komen.php?id=<?= $key['id_postingan'] ?>" class="komen"><span class="icon icon-comment"></span> 1</a><br> -->
	                <a href="#atas">Ke-atas</a>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    </div>
	      <hr class="garis">
	      <br><br>
		<?php endforeach; ?>

      


      <!-- loader -->
      <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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