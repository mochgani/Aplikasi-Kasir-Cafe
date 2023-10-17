<!DOCTYPE html>
<html>
<head>
    <title>Ubah Role</title>

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
                    <h1>Ubah Role</h1><br>

                    <?php
                    $id = $_GET['id'];

                    $result = mysqli_query($conn, "SELECT * FROM role WHERE id_role=$id");

                    while($role_data = mysqli_fetch_array($result)){
                        $nama_role = $role_data['nama_role'];
                        $id_role = $role_data['id_role'];
                    }
                    ?>

                    <form method="post" action="proses-role.php">
                        <input type="hidden" name="id_role" value="<?=$id_role?>">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Role</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_role" placeholder="Masukkan Nama Role" value="<?=$nama_role?>">
                        </div>

                        <input type="submit" name='ubah' value="Ubah" class="w-100 btn btn-lg btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>
</html>