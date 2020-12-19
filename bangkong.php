	<?php 
		session_start();
		require'konek.php';

		if( isset($_SESSION["login"]) ) {
	    header("Location: index.php");
	    exit;
	    }

	    if( !isset($_SESSION["admin"]) ) {
	    header("Location: index.php");
	    exit;
	    }


	 ?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Admin</title>
		<style type="text/css">
			* {
				padding: 0;
				margin: 0;
			}
			.nav {
				width: 25%;
				height: 520px;
				text-align: center;
				background-color: red;
				padding-top: 90px;
				float: left;
			}

			.bulat {
				width: 120px;
				height: 120px;
				border-radius: 50%;
				background-color: grey;
				margin: auto;
				margin-bottom: 20px;
			}

			li {
				margin-bottom: 30px;
			}

			.asa {
				font-size: 40px;
				color: white;
				font-weight: bold;
				background: none;
				border: none;
			}
			.isi {
				width: 75%;
				height: 520px;
				float: left;
				text-align: center;
				padding-top: 90px;		x
			}
			img {
				width: 25px;
				height: 25px;
			}
			#aktif {
				color: black;
			}
		</style>
	</head>
	<body>
		<div class="nav">
			<div class="bulat"></div>
			<ul>
				<li><a class="asa" href="index_admin.php">Postingan</a></li>
				<li><a class="asa" href="user.php">Pengguna</a></li>
				<li><a class="asa" href="keluh.php">Keluhan</a></li>
				<li><a class="asa" href="bangkong.php" id="aktif">daftar</a></li>
				<li><a class="asa" href="logout_admin.php">Logout</a></li>
			</ul>
		</div>
		<div class="isi" id="">
			<form action="" method="post">
		<h1>DAFTAR ADMIN</h1>
		<br><br><br><br>
		<center>
		<table>
			<tr>
				<td><label for="username">username</label></td>
				<td>:</td>
				<td><input type="text" name="username" id="username" autocomplete="off" required=""></td>
			</tr>
			<tr>
				<td><label for="password">password</label></td>
				<td>:</td>
				<td><input type="password" name="password" id="password" autocomplete="off" required=""></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button type="submit" name="daftar">Daftar</button></td>
			</tr>
		</table>
	</form>
	</center>
		</div>
	</body>
	</html>