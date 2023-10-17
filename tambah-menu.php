<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>

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
                    <h1>Tambah Menu</h1><br>

                    <form method="post" action="proses-menu.php">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_menu" placeholder="Masukkan Nama Menu">
                        </div>
                        <div class="mb-3">
                            <label for="form-harga" class="form-label">Harga</label>
                            <input type="number " class="form-control" id="form-harga" name="harga_menu" placeholder="Masukkan Harga Menu">
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
                                    echo "<option value='".$kat['id_kategori']."'>".$kat['nama_kategori']."</option>";
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
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
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