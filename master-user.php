<!DOCTYPE html>
<html>
<head>
    <title>Master User</title>

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
                    <h1>Data User</h1>
                    <a href="tambah-user.php" class="btn btn-primary"><i class="bi-person-fill-add me-1"></i> Tambah Data User</a><br>

                    <?php
                        $sql = "SELECT * FROM user u JOIN role r ON u.id_role=r.id_role";
                        $user = mysqli_query($conn, $sql);
                    ?>

                    <br>

                    <table class="table table-bordered table-striped table-hover" id="data-user"> 
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $row) : 
                            if($row["id_role"]==1) $role='primary';
                            else if($row["id_role"]==2) $role='success';  
                            else $role='info';  
                            ?>
                        <tr>
                            <td><?= $row["id_user"]; ?></td>
                            <td><?= $row["nama_user"]; ?></td>
                            <td><?= $row["username"]; ?></td>
                            <td><span class="badge bg-<?=$role?>"><?= $row["nama_role"]; ?></span></td>
                            <td>

                                <?php 
                                    echo "<a href='ubah-user.php?id=$row[id_user]' class='btn btn-success'><i class='bi-pencil me-1'></i> Edit</a>";
                                ?>
                                <a href="hapus-user.php?id=<?=$row['id_user']; ?>" onclick = "return confirm ('Apakah yakin akan hapus user <?= $row['nama_user']; ?>?');" class='btn btn-danger'><i class='bi-trash me-1'></i> Hapus</a>
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
        new DataTable('#data-user');
    </script>

</body>
</html>