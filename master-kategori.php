<!DOCTYPE html>
<html>
<head>
    <title>Master Kategori Menu</title>

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
                    <h1>Data Kategori Menu</h1>
                    <a href="tambah-kategori.php" class="btn btn-primary"><i class="bi-file-earmark-plus-fill me-1"></i> Tambah Data Kategori Menu</a><br>

                    <?php
                        $sql = "SELECT * FROM kategori";
                        $kategori = mysqli_query($conn, $sql);
                    ?>

                    <br>

                    <table class="table table-bordered table-striped table-hover" id="data-kategori"> 
                        <thead>
                            <tr>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($kategori as $row) : ?>
                        <tr>
                            <td><?= $row["id_kategori"]; ?></td>
                            <td><?= $row["nama_kategori"]; ?></td>
                            <td>

                                <?php 
                                    echo "<a href='ubah-kategori.php?id=$row[id_kategori]' class='btn btn-success'><i class='bi-pencil me-1'></i> Edit</a>";
                                ?>
                                <a href="hapus-kategori.php?id=<?=$row['id_kategori']; ?>" onclick = "return confirm ('Apakah yakin akan hapus kategori <?= $row['nama_kategori']; ?>?');" class='btn btn-danger'><i class='bi-trash me-1'></i> Hapus</a>
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
        new DataTable('#data-kategori');
    </script>

</body>
</html>