<?php 
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM pelanggan WHERE id_pelanggan=$id";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
		echo "
            <script>
                alert('Data Pelanggan Berhasil di Hapus');
                window.location.href='master-pelanggan.php';
            </script>
			";
			
	} else {
		echo "
            <script>
                alert('Data Pelanggan Gagal di Hapus');
                window.location.href='master-pelanggan.php';
            </script>
			";
	}

 ?>