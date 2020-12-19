<?php 

	session_start();
    require'konek.php';

    if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
    }
    
	if (isset($_POST['daftar'])) {
		if ( daftar($_POST) > 0 ) {
			echo "<script>
					alert('Berhasil Membuat Akun');
					alert('Selamat Bersenang senang di INGKAY');
					document.location.href = 'login.php';
				</script>"; 
		} else {
			echo mysqli_error($kon);
		}
	}


 ?><!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,
                                 maximum-scale=1.0, user-scalable=no">
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}

		body {
			background-image: url('images/use_your_illusion.png');
		}

		.kotak {
			margin-top: 100px;
			padding: 50px;
			width: 60%;
			border: none;

		}
		input {
			text-align: center;
			width: 60%;
			height: 60px;
			border:none;
			background-color: rgba(0,0,0,0.1);
			box-shadow: 0 0 10px 0.01px black;
			border-radius: 10px;
			color: white;
			font-weight: bold;
			letter-spacing: 1px;
		}
		.kotak h1 {
			color: white;
			font-weight: bold;
			margin-bottom: 10px;
			font-size: 70px;
		}

		.kotak button {
			width: 200px;
			height: 40px;
			background: none;
			border: none;
			border-radius: 5px;
			color: white;
			box-shadow: 0 0 10px 0.01px black;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<center>
	<div class="kotak">
		<h1>INGKAY-DAFTAR</h1><br>
		<form action="" method="post">
			<input type="text" name="username" id="username" autocomplete="off" required="" placeholder="Username" autofocus=""><br><br>
			<input type="text" name="nama" id="nama" autocomplete="off" required="" placeholder="Nama Pengguna"><br><br>
			<input type="password" name="password" id="username" autocomplete="off" required="" placeholder="Password"><br><br>
			<input type="password" name="cpassword" id="password" autocomplete="off" required="" placeholder="Konfirmasi Password"><br><br><br>
			<button type="submit" name="daftar">Daftar</button> <br><br>
			<a href="login.php" style="color: white;">Login</a> 
		</form>
	</div>
	</center>
</body>
</html>