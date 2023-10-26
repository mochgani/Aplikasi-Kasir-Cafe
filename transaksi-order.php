<!DOCTYPE html>
<html>
<head>
    <title>Order</title>

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
                    <h1>Data Order</h1>
                    <a href="tambah-order.php" class="btn btn-primary"><i class="bi-bag-plus-fill me-1"></i> Order</a><br>

                    <?php
                        $sql = "SELECT * FROM `order` o JOIN user u ON o.id_user=u.id_user JOIN pelanggan p ON o.id_pelanggan=p.id_pelanggan";
                        $order = mysqli_query($conn, $sql);
                    ?>

                    <br>

                    <table class="table table-bordered table-striped table-hover" id="data-order"> 
                        <thead>
                            <tr>
                                <th>ID order</th>
                                <th>No Meja</th>
                                <th>Total</th>
                                <th>Kasir</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $row) : 
                            if($row["status_order"]=='Belum Selesai') $status='danger';
                            else if($row["status_order"]=='Selesai') $status='primary';  
                            ?>
                        <tr>
                            <td><?= $row["id_order"]; ?></td>
                            <td>Meja <?= $row["no_meja"]; ?></td>
                            <td>Rp. <?= number_format($row["total"]); ?></td>
                            <td><?= $row["nama_user"]; ?></td>
                            <td><?= $row["nama_pelanggan"]; ?></td>
                            <td><?= $row["tanggal"]; ?></td>
                            <td><span class="badge bg-<?=$status?>"><?= $row["status_order"]; ?></span></td>
                            <td>

                                <?php 
                                    echo "<a href='detail-order.php?id=$row[id_order]' class='btn btn-success'><i class='bi-list-ul me-1'></i> Detail Order</a>";
                                ?>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

    <script>
        new DataTable('#data-order');
    </script>

</body>
</html>