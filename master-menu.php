<!DOCTYPE html>
<html>
<head>
    <title>Master Menu</title>

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
                    <h1>Data Menu</h1>
                    <a href="tambah-menu.php" class="btn btn-primary"><i class="bi-bag-plus-fill me-1"></i> Tambah Data Menu</a><br>

                    <?php
                        $sql = "SELECT * FROM menu m JOIN kategori k ON m.id_kategori=k.id_kategori";
                        $menu = mysqli_query($conn, $sql);
                    ?>

                    <br>

                    <table class="table table-bordered table-striped table-hover" id="data-menu"> 
                        <thead>
                            <tr>
                                <th>ID Menu</th>
                                <th>Nama menu</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu as $row) : 
                            if($row["id_kategori"]%2==0) $role='primary';
                            else if($row["id_kategori"]%2==1) $role='info';  
                            ?>
                        <tr>
                            <td><?= $row["id_menu"]; ?></td>
                            <td><?= $row["nama_menu"]; ?></td>
                            <td>Rp. <?= number_format($row["harga_menu"]); ?></td>
                            <td><span class="badge bg-<?=$role?>"><?= $row["nama_kategori"]; ?></span></td>
                            <td><?= $row["foto_menu"]; ?></td>
                            <td><?= $row["status_menu"]; ?></td>
                            <td>

                                <?php 
                                    echo "<a href='ubah-menu.php?id=$row[id_menu]' class='btn btn-success'><i class='bi-pencil me-1'></i> Edit</a>";
                                ?>
                                <a href="hapus-menu.php?id=<?=$row['id_menu']; ?>" onclick = "return confirm ('Apakah yakin akan hapus menu <?= $row['nama_menu']; ?>?');" class='btn btn-danger'><i class='bi-trash me-1'></i> Hapus</a>
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
        new DataTable('#data-menu');
    </script>

</body>
</html>