<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori Menu</title>

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
                    <h1>Tambah Kategori Menu</h1><br>

                    <form method="post" action="proses-kategori.php">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Kategori Menu</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_kategori" placeholder="Masukkan Nama Kategori Menu">
                        </div>

                        <input type="submit" name='simpan' value="Simpan" class="w-100 btn btn-lg btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>
</html>