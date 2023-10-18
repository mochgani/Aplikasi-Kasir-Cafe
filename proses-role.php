<?php 

	include 'connection.php';

	if (isset($_POST['simpan'])) {
		
		$nama = $_POST['nama_role'];
		

		$sql = "INSERT INTO role VALUES (NULL , '$nama' )";
		$query = mysqli_query($conn, $sql);

		if($query) {
			echo "
				<script>
					alert('Data Role Berhasil di Simpan');
                    window.location.href='master-role.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Role Gagal di Simpan');
                    window.location.href='master-role.php';
				</script>
			";
		}
	} else if (isset($_POST['ubah'])) {
		
        $id_role = $_POST['id_role'];
		$nama = $_POST['nama_role'];

        $result = mysqli_query($conn, "UPDATE role SET 
                                        nama_role='$nama'
                                        WHERE id_role=$id_role");


		if($result) {
			echo "
				<script>
					alert('Data Role Berhasil di Ubah');
                    window.location.href='master-role.php';
				</script>
			";
		} else {
            echo "
                <script>
                    alert('Data Role Gagal di Ubah');
                    window.location.href='master-role.php';
                </script>
                ";
        }
	}
 ?>