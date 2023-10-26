<?php 
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM detail_order_temp WHERE id_detail_order_temp=$id";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
		echo "
            <script>
                window.location.href='tambah-order.php';
            </script>
			";
			
	} else {
		echo "
            <script>
                window.location.href='tambah-order.php';
            </script>
			";
	}

 ?>