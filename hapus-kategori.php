<?php 
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM kategori WHERE id_kategori=$id";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
		echo "
            <script>
                alert('Data kategori Berhasil di Hapus');
                window.location.href='master-kategori.php';
            </script>
			";
			
	} else {
		echo "
            <script>
                alert('Data kategori Gagal di Hapus');
                window.location.href='master-kategori.php';
            </script>
			";
	}

 ?>