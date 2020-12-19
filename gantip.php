<?php 

    session_start();
    require'konek.php';

    $id = $_SESSION['id'];

    $qq = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
    $user = mysqli_fetch_assoc($qq);
    
    if( isset($_POST["edit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( gantip($_POST) > 0 ) {
		echo "
			<script>
				alert('Password berhasil diubah!');
				alert('Silahkan Login Kembali');
				document.location.href = 'logout.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Password gagal diubah!');
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
					<td><label for="pass">Password lama</label></td>
					<td>:</td>
					<td><input type="password" name="pass" id="pass" autocomplete="off" required=""></td>
				</tr>
				<tr>
					<td><label for="pass2">Password baru</label></td>
					<td>:</td>
					<td><input type="text" name="pass2" id="pass2" autocomplete="off" required=""></td>
				</tr>
			</table>
			<br>
			<center><button type="submit" name="edit">UPDATE</button></center>
		</form>
		<br><br>
		<center><a href="beranda.php" style="color:white;">Kembali</a></center>
	</div>
	</center>
</body>
</html>