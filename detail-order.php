<!DOCTYPE html>
<html>
<head>
    <title>Detail Order</title>

    <?php
	include "header.php";
	?>
</head>
<body>

    <main id="fullpage">
        <?php
        include "sidebar.php";

        $id = $_GET['id'];
        ?>

        <div class="container pt-3 me-0 pe-5 ps-5 scrollarea">
            <div class="row">
                <div class="col">
                    <h1>Detail Order</h1><br>

                    <?php
                    if (isset($_POST['add'])) {

                        $id_order = $_POST['id_order'];

                        $id_menu = $_POST['id_menu'];
                        $jumlah = $_POST['jumlah'];

                        $sql = "INSERT INTO detail_order VALUES (NULL , $id_order, $id_menu, $jumlah, 'Belum Selesai' )";
                        $query = mysqli_query($conn, $sql);

                        $sql = "UPDATE `order` SET status_order='Belum Selesai' WHERE id_order='$id_order'";
                        $query = mysqli_query($conn, $sql);

                        $sql = "SELECT * FROM `detail_order` do JOIN `menu` m ON do.id_menu=m.id_menu WHERE do.id_order='$id_order'";
                        $detail = mysqli_query($conn, $sql);

                        $total_new = 0;
                        while($row = mysqli_fetch_array($detail)){
                            $total_new = $total_new + ($row['jumlah']*$row['harga_menu']);
                        }

                        $sql = "UPDATE `order` SET total=$total_new WHERE id_order='$id_order'";
                        $query = mysqli_query($conn, $sql);

                    }
                    ?>

                    <form method="post">

                        <?php
                            $sql = "SELECT * FROM `order` o JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan WHERE o.id_order='$id'";
                            $order = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_array($order)){
                                $no_meja = $row['no_meja'];
                                $nama_pelanggan = $row['nama_pelanggan'];
                                $tanggal = $row['tanggal'];
                            }
                        ?>
                        <input type="hidden" name="id_order" value="<?=$id?>">

                        <div class="mb-3">
                            <label for="form-meja" class="form-label">No Meja</label><br>
                            
                            <div class="btn-group" id="form-meja" role="group" aria-label="Pilih Meja">
                            <input type="radio" class="btn-check" name="no_meja" id="btnradio1" autocomplete="off" value="<?=$no_meja?>" checked>
                            <label class="btn btn-outline-primary" for="btnradio1">Meja <?=$no_meja?></label>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <label for="form-pelanggan" class="form-label">Pelanggan</label>
                            <input type="number " class="form-control" id="form-pelanggan" name="pelanggan" value="<?=$nama_pelanggan?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="form-tanggal" class="form-label">Tanggal</label>
                            <input type="date " class="form-control" id="form-tanggal" name="tanggal" value="<?=$tanggal?>" disabled>
                        </div><br>
                        <div class="mb-3">
                        <label for="form-menu" class="form-label">Tambah Menu</label>
                            <div class="input-group">
                                <?php
                                    $sql = "SELECT * FROM menu";
                                    $menu = mysqli_query($conn, $sql);
                                ?>

                                <select class="form-select" id="form-menu" name='id_menu'>
                                    <option selected> -- Pilih Menu -- </option>
                                    <?php
                                    foreach ($menu as $pel) {
                                        echo "<option value='".$pel['id_menu']."'>".$pel['nama_menu']."</option>";
                                    }
                                    ?>
                                </select>
                                <input type="number" class="form-control" id="form-menu" name="jumlah" placeholder="Jumlah">
                                <input type="submit" name='add' value="Tambah" class="btn btn-primary">
                            </div>
                        </div> 
                    
                    </form>

                        <?php
                            $sql = "SELECT * FROM `detail_order` do JOIN `menu` m ON do.id_menu=m.id_menu WHERE do.id_order='$id'";
                            $detail = mysqli_query($conn, $sql);
                        ?>
                        
                        <table class="table table-bordered table-striped table-hover" id="data-order"> 
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; foreach ($detail as $k => $row) :
                                if($row["status_detail_order"]=='Belum Selesai') $status='danger';
                                else if($row["status_detail_order"]=='Selesai') $status='primary';    
                                ?>
                                <tr>
                                    <td><?= $k+1; ?></td>
                                    <td><?= $row["nama_menu"]; ?></td>
                                    <td>Rp. <?= number_format($row["harga_menu"]); ?></td>
                                    <td><?= $row["jumlah"]; ?></td>
                                    <td class="text-end">Rp. <?= number_format($row["harga_menu"]*$row["jumlah"]); ?></td>
                                    <td class="text-center"><span class="badge bg-<?=$status?>"><?= $row["status_detail_order"]; ?></span></td>
                                    <td class="text-center">
                                    <?php
                                        if($row["status_detail_order"]=='Belum Selesai') {
                                            echo "<a href='proses-order.php?id_detail_order=$row[id_detail_order]&id_order=$row[id_order]' class='btn btn-success'><i class='bi-check me-1'></i> Proses</a> ";
                                            echo "<a href='hapus-detail.php?id_detail_order=$row[id_detail_order]&id_order=$row[id_order]' class='btn btn-danger'><i class='bi-trash'></i></a>";
                                        }
                                    ?>
                                    </td>
                                </tr>
                                <?php $total += ($row["harga_menu"]*$row["jumlah"]); endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Grand Total</th>
                                    <th colspan=4 class="text-end">Rp. <?= number_format($total); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        
                        <?php
                        $sql = "SELECT * FROM `detail_order` WHERE id_order='$id' and status_detail_order='Belum Selesai'";
                        $detail = mysqli_query($conn, $sql);
            
                        $cek = mysqli_num_rows($detail);
                        if($cek==0){
                        ?>
                        <form method="post" action="transaksi-order.php">
                            <input type="hidden" name="id_order" value="<?=$id?>">
                            <input type="submit" name='simpan' value="Bayar" class="w-100 btn btn-lg btn-primary">
                        </form>
                        <?php } ?>
                    

                </div>
            </div>
        </div>
    </main>

</body>
</html>