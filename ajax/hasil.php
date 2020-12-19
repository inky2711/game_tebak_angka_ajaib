<?php 
	require'../konek.php';

	$ky = $_GET['keyword'];

	$query = "SELECT * FROM user WHERE nama LIKE '%$ky%' LIMIT 5";
	$user = mysqli_query($kon, $query);
 ?>

 					<?php foreach ($user as $key) :?>
                      <div class="user" id="user">
                        &nbsp &nbsp &nbsp &nbsp<a href="bio.php?id=<?= $key['id_user'] ?>" class='nn'><?= $key['nama'] ?></a>
                      </div>
                    <?php endforeach ?>