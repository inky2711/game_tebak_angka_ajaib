<?php 
	$kon = mysqli_connect('localhost', 'root', '', 'ingkay');

	$tanggal = date('d');
		    $bln = date('m');
		    $tahun = date('Y');

		    switch ($bln) {
		        case '01':
		            $bulan = 'Januari';
		            break;
		        case '02':
		            $bulan = 'Februari';
		            break;
		        case '03':
		            $bulan = 'Maret';
		            break;
		        case '04':
		            $bulan = 'April';
		            break;
		        case '05':
		            $bulan = 'Mei';
		            break;
		        case '06':
		            $bulan = 'Juni';
		            break;
		        case '07':
		            $bulan = 'Juli';
		            break;
		        case '08':
		            $bulan = 'Agustus';
		            break;
		        case '09':
		            $bulan = 'September';
		            break;
		        case '10':
		            $bulan = 'Oktober';
		            break;
		        case '11':
		            $bulan = 'November';
		            break;
		        case '12':
		            $bulan = 'Desember';
		            break;
		        default:
		            $bulan = 'tidak valid';
		            break;
		    }

		$tgl = $tanggal . "-" . $bulan . "-" . $tahun ;

	function daftar($data){
		global $kon;

		$username = stripslashes($data['username']);
		$nama = htmlspecialchars($data['nama']);
		$password = mysqli_real_escape_string($kon, $data['password']);
		$password1 = mysqli_real_escape_string($kon, $data['cpassword']);
		$poto = "images/default.png";
		$status = 'Belum Ada Status';
		$angka = 99;

		//cek username 
		$result = mysqli_query($kon, "SELECT * FROM user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('Gunakan username lain!!');
				</script>";
			return false;
		}

		//cek konfirmasi password
		if ($password1 !== $password) {
			echo "<script>
					alert('Password tidak sesuai');
				</script>";
			return false;
		}

		//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//memasukan akun 
		mysqli_query($kon, "INSERT INTO user VALUES ('', '$username', '$password','$nama', '$poto', '$status','$angka')");

		return mysqli_affected_rows($kon);

	}

	function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

	$anak = 'images/'.$namaFileBaru;
	return $anak;
	}

	function ubah($data) {
	global $kon;

	$nama = htmlspecialchars($data["nama"]);
	$sts = htmlspecialchars($data["sts"]);
	$ang = htmlspecialchars($data["ang"]);
	$id = $data['id'];

	$qq = mysqli_query($kon, "SELECT * FROM user WHERE id_user = '$id'");
    $user = mysqli_fetch_assoc($qq);

	$gambarLama = $user['image'];
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

        $query = "UPDATE user SET
				nama = '$nama',
				image = '$gambar',
				status = '$sts',
				number = '$ang'
			  WHERE id_user = '$id'
			";

		mysqli_query($kon, $query);

		
		$_SESSION['username'] = $nama;
		$_SESSION['poto'] = $gambar;
    
		return mysqli_affected_rows($kon);
	}

	function upload2() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

	$anak = 'images/'.$namaFileBaru;
	return $anak;
	}

	function posting($data) {
		global $kon;
		global $tgl;


		$judul = htmlspecialchars($data['judul']);
		$isi = htmlspecialchars($data['isi']);
		$ida = $_SESSION['id'];

		$gambar = upload2();
		if( !$gambar ) {
			$gambar = ' ';
		}

		mysqli_query($kon, "INSERT INTO postingan VALUES ('', '$judul', '$isi', '$gambar', '$tgl', '$ida')");

		return mysqli_affected_rows($kon);

	}

	function keluh($data){
		global $kon;
		global $tgl;

		$isi = htmlspecialchars($data['isi']);
		$nama = $_SESSION['username'];
		$foto = $_SESSION['poto'];

		$aa = mysqli_query($kon, "SELECT * FROM keluhan WHERE username = '$nama' AND tanggal = '$tgl'");

		if (mysqli_num_rows($aa) === 1 ) {
			echo "
			<script>
				alert('user hanya boleh memberikan keluhan maksimal 1x sehari');
			</script>
		";
			return false;
		}

		mysqli_query($kon, "INSERT INTO keluhan VALUES ('', '$isi', '$nama', '$foto', '$tgl')");

		return mysqli_affected_rows($kon);

	}

	function daftara($data){
		global $kon;

		$username = stripslashes($data['username']);
		$password = mysqli_real_escape_string($kon, $data['password']);
		$poto = "images/default.png";

		//cek username 
		$result = mysqli_query($kon, "SELECT * FROM admin WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('Gunakan username lain!!');
				</script>";
			return false;
		}


		//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//memasukan akun 
		mysqli_query($kon, "INSERT INTO admin VALUES ('', '$username', '$password')");

		return mysqli_affected_rows($kon);

	}

	function gantip($data){
		global $kon;

		$pass = htmlspecialchars($data["pass"]);
		$pass2 = htmlspecialchars($data["pass2"]);
		$id = $data['id'];

		$aa = mysqli_query($kon, "SELECT * FROM user WHERE id_user = '$id'");
		$user = mysqli_fetch_assoc($aa);


	    if ( password_verify($pass, $user['password'])) {
	    	$pass2 = password_hash($pass2, PASSWORD_DEFAULT);
	    	$query = "UPDATE user SET password = '$pass2' WHERE id_user = '$id'";
	    	mysqli_query($kon, $query);
		} else {
    	echo "<script>
				alert('password tidak sesuai');
			  </script>";
		return false;
    	}

    	return mysqli_affected_rows($kon);

    }
 ?>