<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>

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
                    <h1>Tambah User</h1><br>

                    <form method="post" action="proses-user.php">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama User</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_user" placeholder="Masukkan Nama User">
                        </div>
                        <div class="mb-3">
                            <label for="form-user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="form-user" name="username" placeholder="Masukkan Username">
                        </div>
                        <div class="mb-3">
                            <label for="form-pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="form-pass" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3">
                            <label for="form-role" class="form-label">Role</label>

                            <?php
                                $sql = "SELECT * FROM role";
                                $roles = mysqli_query($conn, $sql);
                            ?>
                            
                            <select name="id_role" id="form-role" class="form-control">
                                <?php
                                foreach ($roles as $role) {
                                    echo "<option value='".$role['id_role']."'>".$role['nama_role']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <input type="submit" name='simpan' value="Simpan" class="w-100 btn btn-lg btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>
</html>