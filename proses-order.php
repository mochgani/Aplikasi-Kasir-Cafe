<?php 
    session_start();

	include 'connection.php';

    $id_order_get = $_GET['id_order'];
    $id_detail_order = $_GET['id_detail_order'];

	if (isset($_POST['simpan'])) {

        $id_user = $_SESSION['id_user'];
        $id_order_temp = $_POST['id_order_temp'];
        $total = $_POST['total'];

        $sql = "SELECT * FROM `order_temp` WHERE id_order_temp='$id_order_temp'";
        $ordertemp = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($ordertemp)){
            $no_meja = $row['no_meja'];
            $id_pelanggan = $row['id_pelanggan'];

            $sql = "INSERT INTO `order` VALUES (NULL , '$no_meja', now(), '$id_user', '$id_pelanggan', $total, 'Belum Selesai')";
            $insert_order = mysqli_query($conn, $sql);

            $id_order = mysqli_insert_id($conn);
        }

        $sql = "SELECT * FROM `detail_order_temp` WHERE id_user='$id_user' and tanggal='".date('Y-m-d')."'";
        $detailordertemp = mysqli_query($conn, $sql);
		
        while($row = mysqli_fetch_array($detailordertemp)){
            $id_menu = $row['id_menu'];
            $jumlah = $row['jumlah'];

            $sql = "INSERT INTO `detail_order` VALUES (NULL , $id_order, $id_menu, $jumlah, 'Belum Selesai')";
            $insert_detail_order = mysqli_query($conn, $sql);
        }
		
		if($insert_order && $insert_detail_order) {
            $sql = "DELETE FROM `order_temp` WHERE id_order_temp=$id_order_temp";
	        $hapus_ordertemp = mysqli_query($conn, $sql);

            $sql = "DELETE FROM `detail_order_temp` WHERE id_user='$id_user' and tanggal='".date('Y-m-d')."'";
	        $hapus_ordertemp = mysqli_query($conn, $sql);

			echo "
				<script>
					alert('Data Order Berhasil di Simpan');
                    window.location.href='transaksi-order.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Order Gagal di Simpan');
                    window.location.href='tambah-order.php';
				</script>
			";
		}
	} else if($id_detail_order!="" && $id_order_get!=""){
        $sql = "UPDATE detail_order SET status_detail_order='Selesai' WHERE id_detail_order='$id_detail_order'";
        $query = mysqli_query($conn, $sql);

        if ($query){
            echo "
                <script>
                    window.location.href='detail-order.php?id=$id_order_get';
                </script>
                ";
                
        } else {
            echo "
                <script>
                    window.location.href='detail-order.php?id=$id_order_get';
                </script>
                ";
        }
    }

 ?>