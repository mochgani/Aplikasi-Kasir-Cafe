<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>

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
                    <h1>Tambah Pelanggan</h1><br>

                    <form method="post" action="proses-pelanggan.php">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="form-alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="form-alamat" name="alamat" placeholder="Masukkan Alamat Pelanggan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="form-telp" class="form-label">No Telepon</label>
                            <input type="number" class="form-control" id="form-telp" name="no_telepon" placeholder="Masukkan No Telepon Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="form-jk" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="form-jk" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="form-tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="form-tempat" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="form-tanggal" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="form-tanggal" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="form-jp" class="form-label">Jenis Pelanggan</label>
                            <select name="jenis_pelanggan" id="form-jp" class="form-control">
                                <option value="Bronze">Bronze</option>
                                <option value="Silver">Silver</option>
                                <option value="Gold">Gold</option>
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