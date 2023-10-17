<!DOCTYPE html>
<html>
<head>
	<title>Cyber Cafe - Login</title>

	<?php
	include "header.php";
	?>
</head>
<body>
	<?php 
	session_start();
	if ($_SESSION['status'] == "login") {
		echo "<script>window.location.href='home.php'</script>";
	}

	?>

	<main id="form-signin">
		<form method="post" action="ceklogin.php">
			<center><img class="mb-4" src="logo.png" alt="" width="200"></center>
			<h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

			<?php
			if (isset($_GET['pesan'])) {
				if ($_GET['pesan'] == "gagal") {
					echo '<div class="alert alert-danger" role="alert">
							Login gagal, Username atau Password salah!
						</div>';
				}
				elseif ($_GET['pesan'] == "logout") {
					echo '<div class="alert alert-info" role="alert">
							Anda telah berhasil logout
						</div>';
				}
				else {
					echo '<div class="alert alert-info" role="alert">
							Anda larus login untuk mengakses halaman tersebut
						</div>';
				}
			}	
			?>		

			<div class="mb-3">
				<label for="form-user" class="form-label">Username</label>
				<input type="text" class="form-control" id="form-user" name="username" placeholder="Masukkan Username">
			</div>
			<div class="mb-3">
				<label for="form-pass" class="form-label">Password</label>
				<input type="password" class="form-control" name="password" id="form-pass" placeholder="Masukkan Password"></input>
			</div>

			<input type="submit" value="LOGIN" class="w-100 btn btn-lg btn-primary">

		</form>
	</main>

</body>
</html>