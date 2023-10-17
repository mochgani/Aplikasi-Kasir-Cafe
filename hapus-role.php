<?php 
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM role WHERE id_role=$id";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
		echo "
            <script>
                alert('Data Role Berhasil di Hapus');
                window.location.href='master-role.php';
            </script>
			";
			
	} else {
		echo "
            <script>
                alert('Data Role Gagal di Hapus');
                window.location.href='master-role.php';
            </script>
			";
	}

 ?>