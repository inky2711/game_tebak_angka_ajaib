<?php 
    session_start();
    require'konek.php';

    if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
    }

    if (isset($_POST['kirim'])) {
    	if( keluh($_POST) > 0 ) {
		echo "
			<script>
				alert('Keluhan Berhasil Diajukan Kepada ADMIN');
				alert('Mohon maaf atas ketidak nyamanannya');
				alert('Kami akan segera memperbaikinya');
				document.location.href = 'index.php';
			</script>
			";
		} else {
		echo "
			<script>
				document.location.href = 'about.php';
			</script>
		";
		}
    }
 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>About</title>
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
    		height: 3	px;
    		background-color: white;
    	}
    	#subject {
    		width: 400px;
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
                <li><a href="index.php"><span>Home</span></a></li>
                <li class="active"><a href="about.php"><span>About</span></a></li>
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

      <section class="hero-wrap">
      	<div class="overlay"></div>
	      <div class="container-fluid px-0">
	        <div class="row no-gutters text align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-12 ftco-animate text-center">
	           
	          </div>
	        </div>
	      </div>
      </section>

	    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-about ftco-counter">
	    	<div class="container">
		    	<div class="row no-gutters d-flex">
	    			<div class="col-md-12 col-lg-6 d-flex align-items-stretch">
	    			</div>
	    			<div class="col-md-12 col-lg-6 pl-lg-5 py-5 d-flex align-items-center">
	    				<div class="p-0 px-lg-5 p-lg-0">
		    				<div class="row justify-content-start pb-3">
				          <div class="col-md-12 heading-section ftco-animate">
				          	<span class="subheading">Welcome To</span>
				            <h2 class="mb-4">INGKAY</h2>
				            <p>A bad Website who will make your lives is more useless and broken. <a href="inky.php" target="_blank">Who make INGKAY??</a></p>
				          </div>
				        </div>
			          <div class="counter-wrap mb-0 ftco-animate d-flex mt-md-3">
		              <div class="text">
		              	<p class="mb-0">
			                <span class="number" data-number="99">0</span>
			                <span>IQ required</span>
		                </p>
		              </div>
			          </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </section>

	    <section class="ftco-section">
	    	<div class="container">
	    	<h1>Masukan Dan Saran</h1>
	    		<form action="" method="post">
	    			<table>
	    				<tr>
	    					<td><label for="isi">Masukan Dan Saran</label></td>
	    					<td>:</td>
	    					<td><input  type="text" name="isi" id="isi" autocomplete="off" required=""></td>
	    				</tr>
	    				<tr>
	    					<td></td>
	    					<td></td>
	    					<td><button type="submit" name="kirim">KIRIM</button></td>
	    				</tr>
	    			</table>
	    		</form>
	    		<!-- <div class="row">
	        	<div class="col-md-4">
	        		<div class="media block-6 services d-block ftco-animate">
	              <div class="icon"><span class="flaticon-idea"></span></div>
	              <div class="media-body">
	                <h3 class="heading mb-3">Curhatan Remaja</h3>
	                <p>Di INGKAY kalian bebas curhat, tanpa takut ada yang bully</p>
	              </div>
	            </div> 
	        	</div>
	        	<div class="col-md-4">
	        		<div class="media block-6 services d-block ftco-animate">
	              <div class="icon"><span class="flaticon-compass-symbol"></span></div>
	              <div class="media-body">
	                <h3 class="heading mb-3">Kontent MEME</h3>
	                <p>Di INGKAY kalian juga bisa ngememe</p>
	              </div>
	            </div> 
	        	</div>
	        	<div class="col-md-4">
	        		<div class="media block-6 services d-block ftco-animate">
	              <div class="icon"><span class="flaticon-layers"></span></div>
	              <div class="media-body">
	                <h3 class="heading mb-3">SHITPOST</h3>
	                <p>Bukan hanya meme yang bisa di aplod ke INGKAY, Tetapi SHITPOST juga bisa</p>
	              </div>
	            </div> 
	        	</div> -->
	        </div>
	    	</div>
	    </section>
      
      


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