<?php 
	include 'connection.php';

	$id_detail_order = $_GET['id_detail_order'];
    $id_order = $_GET['id_order'];

	$sql = "DELETE FROM detail_order WHERE id_detail_order=$id_detail_order";
	$hapus = mysqli_query($conn, $sql);

	if ($hapus){
        $sql = "SELECT * FROM `detail_order` do JOIN `menu` m ON do.id_menu=m.id_menu WHERE do.id_order='$id_order'";
        $detail = mysqli_query($conn, $sql);

        $total_new = 0;
        while($row = mysqli_fetch_array($detail)){
            $total_new = $total_new + ($row['jumlah']*$row['harga_menu']);
        }

        $sql = "UPDATE `order` SET total=$total_new WHERE id_order='$id_order'";
        $query = mysqli_query($conn, $sql);

		echo "
            <script>
                window.location.href='detail-order.php?id=$id_order';
            </script>
			";
			
	} else {
		echo "
            <script>
                window.location.href='detail-order.php?id=$id_order';
            </script>
			";
	}

 ?>