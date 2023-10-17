<?php 
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM user WHERE id_user=$id";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
		echo "
            <script>
                alert('Data User Berhasil di Hapus');
                window.location.href='master-user.php';
            </script>
			";
			
	} else {
		echo "
            <script>
                alert('Data User Gagal di Hapus');
                window.location.href='master-user.php';
            </script>
			";
	}

 ?>