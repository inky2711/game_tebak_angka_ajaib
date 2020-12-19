<?php 
	session_start();
	require'konek.php';

	if( isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
    }

	if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $bangkong = mysqli_query($kon, "SELECT * FROM admin WHERE username = '$username'");
    
    if ( mysqli_num_rows($bangkong) === 1) {
        $row = mysqli_fetch_assoc($bangkong);
        if ( password_verify($password, $row['password'])) {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: index_admin.php");
            exit;
        }
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>kodok</title>
</head>
<body>
	<form action="" method="post">
		<h1>Login</h1>
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
				<td><button type="submit" name="login">login</button></td>
			</tr>
		</table>
	</form>
</body>
</html>