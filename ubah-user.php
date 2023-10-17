<!DOCTYPE html>
<html>
<head>
    <title>Ubah User</title>

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
                    <h1>Ubah User</h1><br>

                    <?php
                    $id = $_GET['id'];

                    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");

                    while($user_data = mysqli_fetch_array($result)){
                        $username = $user_data['username'];
                        $nama_user = $user_data['nama_user'];
                        $id_role = $user_data['id_role'];
                        $id_user = $user_data['id_user'];
                    }
                    ?>

                    <form method="post" action="proses-user.php">
                        <input type="hidden" name="id_user" value="<?=$id_user?>">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama User</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_user" placeholder="Masukkan Nama User" value="<?=$nama_user?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="form-user" name="username" placeholder="Masukkan Username" value="<?=$username?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="form-pass" placeholder="Kosongkan Jika Tidak ada Perubahan">
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
                                    if($role['id_role'] == $id_role) $selected = 'selected';
                                    else $selected = '';

                                    echo "<option value='".$role['id_role']."' $selected>".$role['nama_role']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <input type="submit" name='ubah' value="Ubah" class="w-100 btn btn-lg btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>
</html>