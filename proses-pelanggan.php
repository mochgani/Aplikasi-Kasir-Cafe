<?php 

	include 'connection.php';

	if (isset($_POST['simpan'])) {
		
        $nama_pelanggan = $_POST['nama_pelanggan'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_pelanggan = $_POST['jenis_pelanggan'];
		

		$sql = "INSERT INTO pelanggan VALUES (NULL , '$nama_pelanggan', '$alamat', '$no_telepon', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$jenis_pelanggan')";
		$query = mysqli_query($conn, $sql);

		if($query) {
			echo "
				<script>
					alert('Data Pelanggan Berhasil di Simpan');
                    window.location.href='master-pelanggan.php';
				</script>
			";
		} else {
            echo "
				<script>
					alert('Data Pelanggan Gagal di Simpan');
                    window.location.href='master-pelanggan.php';
				</script>
			";
        }
	} else if (isset($_POST['ubah'])) {
		
        $id_pelanggan = $_POST['id_pelanggan'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_pelanggan = $_POST['jenis_pelanggan'];

        $result = mysqli_query($conn, "UPDATE pelanggan SET 
                                        nama_pelanggan='$nama_pelanggan',
                                        alamat='$alamat',
                                        no_telepon='$no_telepon',
                                        jenis_kelamin='$jenis_kelamin',
                                        tempat_lahir='$tempat_lahir',
                                        tanggal_lahir='$tanggal_lahir',
                                        jenis_pelanggan='$jenis_pelanggan' 
                                        WHERE id_pelanggan=$id_pelanggan");
					
		if($result) {
			echo "
				<script>
					alert('Data pelanggan Berhasil di Ubah');
                    window.location.href='master-pelanggan.php';
				</script>
			";
		} else {
            echo "
                <script>
                    alert('Data pelanggan Gagal di Ubah');
                    window.location.href='master-pelanggan.php';
                </script>
                ";
        }
	}
 ?>