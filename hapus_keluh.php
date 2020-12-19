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

	    $id = $_GET['id'];
	    mysqli_query($kon, "DELETE FROM keluhan WHERE id = '$id'");

	    if (mysqli_affected_rows($kon) > 0) {
	    	echo "
			<script>
				alert('sucsess');
				document.location.href = 'keluh.php';
			</script>
			";
		} else {
		echo "
			<script>
				alert('faill');
				document.location.href = 'keluh.php';
			</script>
		";
	    }
 ?>