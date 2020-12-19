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

	    if (isset($_POST['kirim'])) {
	    	$isi = $_POST['peng'];
	    	$time = time();

	    	mysqli_query($kon, "INSERT INTO pengumuman VALUES ('', '$isi', '$tgl', '$time')");

	    	if (mysqli_affected_rows($kon) > 0) {
	    	echo "
			<script>
				alert('sucsess');
			</script>
			";
		} else {
		echo "
			<script>
				alert('faill');
			</script>
		";
	    }


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
				<li><a class="asa" href="index_admin.php" id="aktif">Postingan</a></li>
				<li><a class="asa" href="user.php">Pengguna</a></li>
				<li><a class="asa" href="keluh.php">Keluhan</a></li>
				<li><a class="asa" href="bangkong.php">daftar</a></li>
				<li><a class="asa" href="logout_admin.php">Logout</a></li>
			</ul>
		</div>
		<div class="isi" id="">
			<h1>POSTINGAN</h1>
			<?php 
				$posting = mysqli_query($kon, "SELECT * FROM postingan ORDER BY tanggal ");
			 ?>
			<br><br><br>
			<center>
			<table border="1px" width="95%">
				<tr>
					<th>Id</th>
					<th>Foto</th>
					<th>id siswa</th>
					<th>Judul</th>
					<th>Isi</th>
					<th>Tanggal</th>
					<th>Gambar</th>
					<th>Action</th>
				</tr>
				<?php foreach ($posting as $key) :?>
				<tr>
					<td><?= $key['id_postingan']; ?></td>
					<td><img src="<?= $key['foto']; ?>"></td>
					<td><?= $key['id_user']; ?></td>
					<td><?= $key['judul']; ?></td>
					<td><?= $key['isi']; ?></td>
					<td><?= $key['tanggal']; ?></td>
					<td><img src="<?= $key['gambar']; ?>"></td>
					<td><a href="hapus.php?id=<?= $key['id'] ?>" onclick="return confirm('Yakin??');">Hapus</a>
					</td>
				</tr>
				<?php endforeach ?>
			</table>
			</center>
		</div>
	</body>
	</html>