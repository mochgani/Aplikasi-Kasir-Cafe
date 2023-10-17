<?php 
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM menu WHERE id_menu=$id";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
		echo "
            <script>
                alert('Data menu Berhasil di Hapus');
                window.location.href='master-menu.php';
            </script>
			";
			
	} else {
		echo "
            <script>
                alert('Data menu Gagal di Hapus');
                window.location.href='master-menu.php';
            </script>
			";
	}

 ?>