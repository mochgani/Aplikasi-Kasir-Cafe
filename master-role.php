<!DOCTYPE html>
<html>
<head>
    <title>Master Role</title>

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
                    <h1>Data Role</h1>
                    <a href="tambah-role.php" class="btn btn-primary"><i class="bi-shield-fill-plus me-1"></i> Tambah Data Role</a><br>

                    <?php
                        $sql = "SELECT * FROM role";
                        $role = mysqli_query($conn, $sql);
                    ?>

                    <br>

                    <table class="table table-bordered table-striped table-hover" id="data-role"> 
                        <thead>
                            <tr>
                                <th>ID Role</th>
                                <th>Nama Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($role as $row) : ?>
                        <tr>
                            <td><?= $row["id_role"]; ?></td>
                            <td><?= $row["nama_role"]; ?></td>
                            <td>

                                <?php 
                                    echo "<a href='ubah-role.php?id=$row[id_role]' class='btn btn-success'><i class='bi-pencil me-1'></i> Edit</a>";
                                ?>
                                <a href="hapus-role.php?id=<?=$row['id_role']; ?>" onclick = "return confirm ('Apakah yakin akan hapus role <?= $row['nama_role']; ?>?');" class='btn btn-danger'><i class='bi-trash me-1'></i> Hapus</a>
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
        new DataTable('#data-role');
    </script>

</body>
</html>