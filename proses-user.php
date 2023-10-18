<?php 

	include 'connection.php';

	if (isset($_POST['simpan'])) {
		
		$role = $_POST['id_role'];
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$password = md5($pass);
		$nama = $_POST['nama_user'];
		

		$sql = "INSERT INTO user VALUES (NULL , $role, '$user', '$password', '$nama' )";
		$query = mysqli_query($conn, $sql);

		if($query) {
			echo "
				<script>
					alert('Data User Berhasil di Simpan');
                    window.location.href='master-user.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data User Gagal di Simpan');
                    window.location.href='master-user.php';
				</script>
			";
		}
	} else if (isset($_POST['ubah'])) {
		
        $id_user = $_POST['id_user'];
		$role = $_POST['id_role'];
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$password = md5($pass);
		$nama = $_POST['nama_user'];

        if($pass==''){
            $result = mysqli_query($conn, "UPDATE user SET 
                                            username='$user',
                                            nama_user='$nama',
                                            id_role='$role' 
                                            WHERE id_user=$id_user");
        } else {
            $result = mysqli_query($conn, "UPDATE user SET 
                                            username='$user',
                                            password='$password',
                                            nama_user='$nama',
                                            id_role='$role' 
                                            WHERE id_user=$id_user");
        }
		

		if($result) {
			echo "
				<script>
					alert('Data User Berhasil di Ubah');
                    window.location.href='master-user.php';
				</script>
			";
		} else {
            echo "
                <script>
                    alert('Data User Gagal di Ubah');
                    window.location.href='master-user.php';
                </script>
                ";
        }
	}
 ?>