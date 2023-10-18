<!DOCTYPE html>
<html>
<head>
    <title>Master Pelanggan</title>

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
                    <h1>Data Pelanggan</h1>
                    <a href="tambah-pelanggan.php" class="btn btn-primary"><i class="bi-person-fill-add me-1"></i> Tambah Data Pelanggan</a><br>

                    <?php
                        $sql = "SELECT * FROM pelanggan";
                        $pelanggan = mysqli_query($conn, $sql);
                    ?>

                    <br>

                    <table class="table table-bordered table-striped table-hover" id="data-pelanggan"> 
                        <thead>
                            <tr>
                                <th>ID pelanggan</th>
                                <th>Nama pelanggan</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>Jenis Pelanggan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pelanggan as $row) : 
                            if($row["jenis_pelanggan"]=='Bronze') $p='secondary';
                            else if($row["jenis_pelanggan"]=='Silver') $p='light text-dark';
                            else if($row["jenis_pelanggan"]=='Gold') $p='warning text-dark';
                            
                            $tgl_lahir = strtotime($row["tanggal_lahir"]);
                            ?>
                        <tr>
                            <td><?= $row["id_pelanggan"]; ?></td>
                            <td><?= $row["nama_pelanggan"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["no_telepon"]; ?></td>
                            <td><?= $row["jenis_kelamin"]; ?></td>
                            <td><?= $row["tempat_lahir"]; ?>, <?= date('d-m-Y',$tgl_lahir); ?></td>
                            <td><span class="badge bg-<?=$p?>"><?= $row["jenis_pelanggan"]; ?></span></td>
                            <td>

                                <?php 
                                    echo "<a href='ubah-pelanggan.php?id=$row[id_pelanggan]' class='btn btn-success'><i class='bi-pencil me-1'></i> Edit</a>";
                                ?>
                                <a href="hapus-pelanggan.php?id=<?=$row['id_pelanggan']; ?>" onclick = "return confirm ('Apakah yakin akan hapus pelanggan <?= $row['nama_pelanggan']; ?>?');" class='btn btn-danger'><i class='bi-trash me-1'></i> Hapus</a>
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
        new DataTable('#data-pelanggan');
    </script>

</body>
</html>