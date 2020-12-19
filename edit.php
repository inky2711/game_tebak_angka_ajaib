<?php 

    session_start();
    require'konek.php';

    $id = $_SESSION['id'];

    $qq = mysqli_query($kon, "SELECT * FROM user WHERE id_user = '$id'");
    $user = mysqli_fetch_assoc($qq);
    
    if( isset($_POST["edit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
			</script>
		";
	}


}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>EDIT PROFIL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,
                                 maximum-scale=1.0, user-scalable=no">
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}
		table{

			color: white;
		}
		body {
			background-image: url('images/use_your_illusion.png');
		}

		.kotak {
			margin-top: 100px;
			padding: 50px;
			width: 60%;
			border: none;
			box-shadow: 0 0 20px 10px black;

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
		.aku {
        width: 100px;
        height: 100px;
        float: left;
        border-radius: 50%;
        margin-bottom: 100px;
      }
      .per {
      	color: red;
      }
	</style>
</head>
<body>
	<center>
	<div class="kotak">
		<h1>EDIT PROFIL</h1><br>
		<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $user['id_user'] ?>">
			<table>
				<tr>
					<td><label for="username">username</label></td>
					<td>:</td>
					<td><p><?= $user['username'] ?></p></td>
				</tr>
				<tr>
					<td><label for="nama">Nama Pengguna</label></td>
					<td>:</td>
					<td><input type="text" name="nama" id="nama" autocomplete="off" required="" value="<?= $user['nama'] ?>"></td>
				</tr>
				<tr>
					<td><label for="sts">Status</label></td>
					<td>:</td>
					<td><input type="text" name="sts" id="sts" autocomplete="off" value="<?= $user['status'] ?>"></td>
				</tr>
				<tr>
					<td><label for="ang">Angka Keberuntungan</label></td>
					<td>:</td>
					<td><input type="text" name="ang" id="ang" autocomplete="off" value="<?= $user['number'] ?>"></td>
				</tr>
				<tr>
					<td><img src="<?= $user['image'] ?>" class='aku'></td>
					<td>:</td>
					<td><input type="file" name="gambar" id="gambar" autocomplete="off" ></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><p class="per">ukuran gambar tidak boleh lebih dari 1MB!</p></td>
				</tr>
			</table>
			<br>
			<center><button type="submit" name="edit">UPDATE</button></center>
		</form>
		<br><br>
		<center><a href="gantip.php" style="color:white;">Ganti Password</a></center>
		<br><br><br>
		<center><a href="beranda.php" style="color:white;">Kembali</a></center>
	</div>
	</center>
</body>
</html>