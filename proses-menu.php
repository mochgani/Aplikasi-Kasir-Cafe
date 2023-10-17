<?php 

	include 'connection.php';

	if (isset($_POST['simpan'])) {
		
		$kategori = $_POST['id_kategori'];
		$harga_menu = $_POST['harga_menu'];
		$status_menu = $_POST['status_menu'];
		$nama_menu = $_POST['nama_menu'];
        $foto_menu = $_POST['foto_menu'];
		

		$sql = "INSERT INTO menu VALUES (NULL , '$nama_menu', $harga_menu, $kategori, '-', '$status_menu')";
		$query = mysqli_query($conn, $sql);

		if($query) {
			echo "
				<script>
					alert('Data Menu Berhasil di Simpan');
                    window.location.href='master-menu.php';
				</script>
			";
		}
	} else if (isset($_POST['ubah'])) {
		
        $id_menu = $_POST['id_menu'];
		$kategori = $_POST['id_kategori'];
		$harga_menu = $_POST['harga_menu'];
		$status_menu = $_POST['status_menu'];
		$nama_menu = $_POST['nama_menu'];
        $foto_menu = $_POST['foto_menu'];

        $result = mysqli_query($conn, "UPDATE menu SET 
                                        nama_menu='$nama_menu',
                                        harga_menu='$harga_menu',
                                        id_kategori='$kategori',
                                        status_menu='$status_menu' 
                                        WHERE id_menu=$id_menu");
					
		if($result) {
			echo "
				<script>
					alert('Data Menu Berhasil di Ubah');
                    window.location.href='master-menu.php';
				</script>
			";
		} else {
            echo "
                <script>
                    alert('Data Menu Gagal di Ubah');
                    window.location.href='master-menu.php';
                </script>
                ";
        }
	}
 ?>