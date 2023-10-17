<!DOCTYPE html>
<html>
<head>
    <title>Ubah Kategori Menu</title>

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
                    <h1>Ubah Kategori Menu</h1><br>

                    <?php
                    $id = $_GET['id'];

                    $result = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori=$id");

                    while($kategori_data = mysqli_fetch_array($result)){
                        $nama_kategori = $kategori_data['nama_kategori'];
                        $id_kategori = $kategori_data['id_kategori'];
                    }
                    ?>

                    <form method="post" action="proses-kategori.php">
                        <input type="hidden" name="id_kategori" value="<?=$id_kategori?>">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Kategori Menu</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_kategori" placeholder="Masukkan Nama kategori menu" value="<?=$nama_kategori?>">
                        </div>

                        <input type="submit" name='ubah' value="Ubah" class="w-100 btn btn-lg btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>
</html>