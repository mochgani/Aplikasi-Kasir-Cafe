<?php 

	include 'connection.php';

	if (isset($_POST['simpan'])) {
		
		$nama = $_POST['nama_kategori'];
		

		$sql = "INSERT INTO kategori VALUES (NULL , '$nama' )";
		$query = mysqli_query($conn, $sql);

		if($query) {
			echo "
				<script>
					alert('Data kategori Berhasil di Simpan');
                    window.location.href='master-kategori.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data kategori Gagal di Simpan');
                    window.location.href='master-kategori.php';
				</script>
			";
		}
	} else if (isset($_POST['ubah'])) {
		
        $id_kategori = $_POST['id_kategori'];
		$nama = $_POST['nama_kategori'];

        $result = mysqli_query($conn, "UPDATE kategori SET 
                                        nama_kategori='$nama'
                                        WHERE id_kategori=$id_kategori");


		if($result) {
			echo "
				<script>
					alert('Data kategori Berhasil di Ubah');
                    window.location.href='master-kategori.php';
				</script>
			";
		} else {
            echo "
                <script>
                    alert('Data kategori Gagal di Ubah');
                    window.location.href='master-kategori.php';
                </script>
                ";
        }
	}
 ?>