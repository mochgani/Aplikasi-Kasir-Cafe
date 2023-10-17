<!DOCTYPE html>
<html>
<head>
    <title>Ubah Menu</title>

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
                    <h1>Ubah Menu</h1><br>

                    <?php
                    $id = $_GET['id'];

                    $result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu=$id");

                    while($menu_data = mysqli_fetch_array($result)){
                        $id_menu = $menu_data['id_menu'];
                        $harga_menu = $menu_data['harga_menu'];
                        $nama_menu = $menu_data['nama_menu'];
                        $id_kategori = $menu_data['id_kategori'];
                        $status_menu = $menu_data['status_menu'];
                    }
                    ?>

                    <form method="post" action="proses-menu.php">
                        <input type="hidden" name="id_menu" value="<?=$id_menu?>">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_menu" placeholder="Masukkan Nama Menu" value="<?=$nama_menu?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-harga" class="form-label">Harga</label>
                            <input type="number " class="form-control" id="form-harga" name="harga_menu" placeholder="Masukkan Harga Menu" value="<?=$harga_menu?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-kategori" class="form-label">Kategori Menu</label>

                            <?php
                                $sql = "SELECT * FROM kategori";
                                $kategori = mysqli_query($conn, $sql);
                            ?>
                            
                            <select name="id_kategori" id="form-kategori" class="form-control">
                                <?php
                                foreach ($kategori as $kat) {
                                    if($kat['id_kategori'] == $id_kategori) $selected = 'selected';
                                    else $selected = '';

                                    echo "<option value='".$kat['id_kategori']."' $selected>".$kat['nama_kategori']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="form-foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="form-foto" name="foto_menu">
                        </div>
                        <div class="mb-3">
                            <label for="form-status" class="form-label">Status</label>
                            <select name="status_menu" id="form-status" class="form-control">
                                <option value="Tersedia" <?=($status_menu=='Tersedia')?'selected':''?>>Tersedia</option>
                                <option value="Tidak Tersedia" <?=($status_menu=='Tidak Tersedia')?'selected':''?>>Tidak Tersedia</option>
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