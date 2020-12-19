<?php 

    session_start();
    require'konek.php';

    if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
    }

    if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["pass"];

    $admin = mysqli_query($kon, "SELECT * FROM user WHERE username = '$username'");
    
    if ( mysqli_num_rows($admin) === 1) {
        $row = mysqli_fetch_assoc($admin);
        if ( password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['nama'];
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['nama'] = $row['username'];
            $_SESSION['poto'] = $row['image'];
            header("Location: index.php");
            exit;
        }
    }

    $bangkong = mysqli_query($kon, "SELECT * FROM admin WHERE username = '$username'");
    
    if ( mysqli_num_rows($bangkong) === 1) {
        $row = mysqli_fetch_assoc($bangkong);
        if ( password_verify($password, $row['password'])) {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
    
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		<h1>INGKAY-LOGIN</h1><br>
		<form action="" method="post">
			<input type="text" name="username" autocomplete="off" required="" placeholder="Username" autofocus=""><br><br>
			<input type="password" name="pass" autocomplete="off" required="" placeholder="Password"><br><br>
			<?php if( isset($error) ) : ?>
             <p style="color: red; font-style: italic;">username / password salah</p>
            <?php endif; ?>
			<a href="register.php" style="color:white;">Not Have Account Yet?</a><br><br>
			<button type="submit" name="login">Login</button>
		</form>
	</div>
	</center>
</body>
</html>