<?php 

	session_start();

	include 'connection.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$data = mysqli_query($conn, "select * 
									from user where username='$username' and
									password = '$password'");

	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		$login = mysqli_fetch_array($data);

		$_SESSION['id_user'] = $login['id'];
		$_SESSION['username'] = $username;
		$_SESSION['id_role'] = $login['id_role'];
		$_SESSION['nama_user'] = $login['nama_user'];
		$_SESSION['status'] = 'login';

		if ($login['id_role'] == 1) {
			header("location:home.php");
		}
		elseif ($login['id_role'] == 2) {
			header("location:home-manager.php");
		}
		elseif ($login['id_role'] == 3) {
			header("location:home-kasir.php");
		}
		
	}else {
		header("location:index.php?pesan=gagal");
	}

 ?>