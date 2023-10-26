<!DOCTYPE html>
<html>
<head>
    <title>Orderan Baru</title>

    <?php
	include "header.php";
	?>
</head>
<body>

    <main id="fullpage">
        <?php
        include "sidebar.php";
        ?>

        <div class="container pt-3 me-0 pe-5 ps-5 scrollarea">
            <div class="row">
                <div class="col">
                    <h1>Orderan Baru</h1><br>

                    <?php
                    if (isset($_POST['add'])) {

                        $id_order_temp = $_POST['id_order_temp'];
                        $no_meja = $_POST['no_meja'];
                        $id_pelanggan = $_POST['id_pelanggan'];

                        if($no_meja=="" & $id_pelanggan==""){
                            echo "<script>alert('Meja dan Pelanggan Harus diisi!');</script>";
                        } else {
                            $id_menu = $_POST['id_menu'];
                            $jumlah = $_POST['jumlah'];
                            $id_user = $_SESSION['id_user'];

                            if($id_order_temp==""){
                                $sql = "INSERT INTO order_temp VALUES (NULL , '$no_meja', '".date('Y-m-d')."', '$id_user', '$id_pelanggan' )";
                                $query = mysqli_query($conn, $sql);
                            }
                            
                            $sql = "SELECT * FROM `detail_order_temp` WHERE id_user='$id_user' and id_menu='$id_menu' and tanggal='".date('Y-m-d')."'";
                            $detailordertemp = mysqli_query($conn, $sql);
                            $cek = mysqli_num_rows($detailordertemp);

                            if($cek > 0){
                                $data_detail = mysqli_fetch_array($detailordertemp);
                                $jumlah_update = $jumlah + $data_detail['jumlah'];
                                $sql = "UPDATE detail_order_temp SET jumlah='$jumlah_update' WHERE id_user='$id_user' and id_menu='$id_menu'";
                                $query = mysqli_query($conn, $sql);
                            } else {
                                $sql = "INSERT INTO detail_order_temp VALUES (NULL , '".date('Y-m-d')."', '$id_user', '$id_menu', '$jumlah' )";
                                $query = mysqli_query($conn, $sql);
                            }
                        }

                    }
                    ?>

                    <form method="post">

                        <?php
                            $sql = "SELECT * FROM `order_temp` WHERE id_user='".$_SESSION['id_user']."' and tanggal='".date('Y-m-d')."'";
                            $ordertemp = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_array($ordertemp)){
                                $id_order_temp = $row['id_order_temp'];
                                $no_meja = $row['no_meja'];
                                $id_pelanggan = $row['id_pelanggan'];
                            }
                        ?>
                        <input type="hidden" name="id_order_temp" value="<?=$id_order_temp?>">

                        <div class="mb-3">
                            <label for="form-meja" class="form-label">No Meja</label><br>
                            
                            <div class="btn-group" id="form-meja" role="group" aria-label="Pilih Meja">
                            <input type="radio" class="btn-check" name="no_meja" id="btnradio1" autocomplete="off" value="1" <?=($no_meja==1)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio1">Meja 1</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio2" autocomplete="off" value="2" <?=($no_meja==2)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio2">Meja 2</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio3" autocomplete="off" value="3" <?=($no_meja==3)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio3">Meja 3</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio4" autocomplete="off" value="4" <?=($no_meja==4)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio4">Meja 4</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio5" autocomplete="off" value="5" <?=($no_meja==5)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio5">Meja 5</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio6" autocomplete="off" value="6" <?=($no_meja==6)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio6">Meja 6</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio7" autocomplete="off" value="7" <?=($no_meja==7)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio7">Meja 7</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio8" autocomplete="off" value="8" <?=($no_meja==8)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio8">Meja 8</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio9" autocomplete="off" value="9" <?=($no_meja==9)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio9">Meja 9</label>

                            <input type="radio" class="btn-check" name="no_meja" id="btnradio10" autocomplete="off" value="10" <?=($no_meja==10)?'checked':''?>>
                            <label class="btn btn-outline-primary" for="btnradio10">Meja 10</label>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <label for="form-pelanggan" class="form-label">Pelanggan</label>

                            <?php
                                $sql = "SELECT * FROM pelanggan";
                                $pelanggan = mysqli_query($conn, $sql);
                            ?>
                            
                            <select name="id_pelanggan" id="form-pelanggan" class="form-control">
                                <option value=""> -- Pilih Pelanggan -- </option>
                                <?php
                                foreach ($pelanggan as $pel) {
                                    if($pel['id_pelanggan'] == $id_pelanggan) $selected = 'selected';
                                    else $selected = '';

                                    echo "<option value='".$pel['id_pelanggan']."' $selected>".$pel['nama_pelanggan']."</option>";
                                }
                                ?>
                            </select>
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
                            $sql = "SELECT * FROM `detail_order_temp` do JOIN `menu` m ON do.id_menu=m.id_menu WHERE do.id_user='".$_SESSION['id_user']."' and do.tanggal='".date('Y-m-d')."'";
                            $temp = mysqli_query($conn, $sql);
                        ?>
                        
                        <table class="table table-bordered table-striped table-hover" id="data-order"> 
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; foreach ($temp as $k => $row) : ?>
                                <tr>
                                    <td><?= $k+1; ?></td>
                                    <td><?= $row["nama_menu"]; ?></td>
                                    <td>Rp. <?= number_format($row["harga_menu"]); ?></td>
                                    <td><?= $row["jumlah"]; ?></td>
                                    <td class="text-end">Rp. <?= number_format($row["harga_menu"]*$row["jumlah"]); ?></td>
                                    <td class="text-center">
                                    <?php 
                                        echo "<a href='hapus-detail-temp.php?id=$row[id_detail_order_temp]' class='btn btn-danger'><i class='bi-trash'></i></a>";
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

                        <form method="post" action="proses-order.php">
                            <input type="hidden" name="id_order_temp" value="<?=$id_order_temp?>">
                            <input type="hidden" name="total" value="<?=$total?>">
                            <input type="submit" name='simpan' value="Order" class="w-100 btn btn-lg btn-primary">
                        </form>
                    

                </div>
            </div>
        </div>
    </main>

</body>
</html>