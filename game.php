<?php 
	
	if (isset($_POST['game'])) {
		$rand = rand(1,10);
		$rand1 = rand(1,20);
		echo "
			<script>
				alert('Pilih Angka Random (acak) Dari 1 - 9');
				alert('Jumlahkan Dengan 10');
				alert('Kurangi Dengan 15');
				alert('Jumlahkan Dengan 13');
				alert('Kurangi Dengan 9');
				alert('Kalikan Dengan $rand');
				alert('Jumlahkan Dengan Angka Yang Anda Pilih');	
				alert('Bagikan Dengan Angka Yang Anda Pilih');
				alert('Jumlahkan Dengan $rand1');
			</script>
		";

		$awal = 5;
		$hasil = $awal;



		$hasil += 10;
		$hasil -= 15;
		$hasil += 13;
		$hasil -= 9;
		$hasil *= $rand;
		$hasil += $awal;
		$hasil /= $awal;
		$hasil += $rand1;

	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>GAME TEBAK ANGKA</title>
	<meta charset="utf-8">
	<meta name="theme-color" content="#fff">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,
                                 maximum-scale=1.0, user-scalable=no">
    <style type="text/css">
    	body {
    		background-image: url('images/use_your_illusion.png');
    	}
    	.container {
    		text-align: center;
    		margin-top: 20%;
    	}
    	.container button {
    		text-align: center;
			width: 20%;
			height: 60px;
			border:none;
			background-color: rgba(0,0,0,0.1);
			box-shadow: 0 0 10px 0.01px black;
			border-radius: 10px;
			color: white;
			font-weight: bold;
			letter-spacing: 1px;
    	}
    	.container h1 {
    		color: white;
    	}
    	.container a {
    		color: white;
    	}
    </style>
</head>
<body>
<div class="container">
	<h1>GAME TEBAK ANGKA AJAIB DI INGKAY</h1>
	<p style="color : red">*note: Harap Menggunakan Kalkukalor Jika anda bodoh</p>
	<form method="post" action="">
		<button name="game" type="submit" autofocus="">MULAI!!</button>
		<?php if (isset($hasil)) :?>
			<h1>HASILNYA ADALAH <?= $hasil ?></h1>
			<a href="game.php">Reset</a> || <a href="index.php">Kembali</a>
		<?php endif ?>
	</form>
</div>
</body>
</html>