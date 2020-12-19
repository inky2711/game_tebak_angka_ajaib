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
				<li><a class="asa" href="keluh.php" id="aktif">Keluhan</a></li>
				<li><a class="asa" href="bangkong.php">daftar</a></li>
				<li><a class="asa" href="logout_admin.php">Logout</a></li>
			</ul>
		</div>
		<div class="isi" id="">
			<h1>KELUHAN</h1>
			<?php 
				$posting = mysqli_query($kon, "SELECT * FROM keluhan ORDER BY id DESC");
			 ?>
			<br><br><br>
			<center>
			<table 	border="1px" width="95%">
				<tr>
					<th>Id</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>isi</th>
					<th>tanggal</th>
					<th>Action</th>
				</tr>
				<?php foreach ($posting as $key) :?>
				<tr>
					<td><?= $key['id']; ?></td>
					<td><img src="<?= $key['foto']; ?>"></td>
					<td><?= $key['username']; ?></td>
					<td><?= $key['isi']; ?></td>
					<td><?= $key['tanggal']; ?></td>
					<td><a href="hapus_keluh.php?id=<?= $key['id'] ?>" onclick="return confirm('Yakin??');">Hapus</a>
					</td>
				</tr>
				<?php endforeach ?>
			</table>
			</center>
		</div>
	</body>
	</html>