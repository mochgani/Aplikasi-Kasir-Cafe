<!DOCTYPE html>
<html>
<head>
    <title>Ubah Pelanggan</title>

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
                    <h1>Ubah Pelanggan</h1><br>

                    <?php
                    $id = $_GET['id'];

                    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan=$id");

                    while($pelanggan_data = mysqli_fetch_array($result)){
                        $id_pelanggan = $pelanggan_data['id_pelanggan'];
                        $alamat = $pelanggan_data['alamat'];
                        $nama_pelanggan = $pelanggan_data['nama_pelanggan'];
                        $no_telepon = $pelanggan_data['no_telepon'];
                        $jenis_kelamin = $pelanggan_data['jenis_kelamin'];
                        $tempat_lahir = $pelanggan_data['tempat_lahir'];
                        $tanggal_lahir = $pelanggan_data['tanggal_lahir'];
                        $jenis_pelanggan = $pelanggan_data['jenis_pelanggan'];
                    }
                    ?>

                    <form method="post" action="proses-pelanggan.php">
                        <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan?>">
                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="form-nama" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" value="<?=$nama_pelanggan?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="form-alamat" name="alamat" placeholder="Masukkan Alamat Pelanggan"><?=$alamat?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="form-telp" class="form-label">No Telepon</label>
                            <input type="number" class="form-control" id="form-telp" name="no_telepon" placeholder="Masukkan No Telepon Pelanggan" value="<?=$no_telepon?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-jk" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="form-jk" class="form-control">
                                <option value="Laki-laki" <?=($jenis_kelamin=='Laki-laki')?'selected':''?>>Laki-laki</option>
                                <option value="Perempuan" <?=($jenis_kelamin=='Perempuan')?'selected':''?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="form-tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="form-tempat" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Pelanggan" value="<?=$tempat_lahir?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-tanggal" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="form-tanggal" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Pelanggan" value="<?=$tanggal_lahir?>">
                        </div>
                        <div class="mb-3">
                            <label for="form-jp" class="form-label">Jenis Pelanggan</label>
                            <select name="jenis_pelanggan" id="form-jp" class="form-control">
                                <option value="Bronze" <?=($jenis_pelanggan=='Bronze')?'selected':''?>>Bronze</option>
                                <option value="Silver" <?=($jenis_pelanggan=='Silver')?'selected':''?>>Silver</option>
                                <option value="Gold" <?=($jenis_pelanggan=='Gold')?'selected':''?>>Gold</option>
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