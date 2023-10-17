<!-- cek sudah login -->
<?php 
session_start();

include 'connection.php';

if ($_SESSION['status'] != "login") {
    echo "<script>window.location.href='index.php?pesan=belum_login'</script>";
}

function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    
    $pages = explode(",",$currect_page);

    foreach($pages as $page){
        if(stripos($url,$page) === 0){
            echo 'active';
        }
    }
    
     
}
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <img src="logo.png" alt="" width="100" style="margin-left:15px;">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    
    <li>
        <?php if($_SESSION['id_role']==1){ ?>
            <a href="home.php" class="nav-link text-white <?php active('home'); ?>">
        <?php }else if($_SESSION['id_role']==2){ ?>
            <a href="home-manager.php" class="nav-link text-white <?php active('home-manager'); ?>">
        <?php }else if($_SESSION['id_role']==3){ ?>
            <a href="home-kasir.php" class="nav-link text-white <?php active('home-kasir'); ?>">
        <?php } ?>
        <i class="bi-clipboard-data me-2"></i> 
        Dashboard
        </a>
    </li>
    <?php if($_SESSION['id_role']==1){ ?>
    <li>
        <a href="master-user.php" class="nav-link text-white <?php active('master-user,tambah-user,ubah-user'); ?>">
        <i class="bi-people-fill me-2"></i> 
        User
        </a>
    </li>
    <li>
        <a href="master-role.php" class="nav-link text-white <?php active('master-role,tambah-role,ubah-role'); ?>">
        <i class="bi-person-fill-lock me-2"></i> 
        Role
        </a>
    </li>
    <li>
        <a href="master-kategori.php" class="nav-link text-white <?php active('master-kategori,tambah-kategori,ubah-kategori'); ?>">
        <i class="bi-collection-fill me-2"></i> 
        Kategori Menu
        </a>
    </li>
    <li>
        <a href="master-menu.php" class="nav-link text-white <?php active('master-menu,tambah-menu,ubah-menu'); ?>">
        <i class="bi-cup-hot-fill me-2"></i> 
        Menu
        </a>
    </li>
    <?php } ?>

    <?php if($_SESSION['id_role']==1 || $_SESSION['id_role']==3){ ?>
    <li>
        <a href="#" class="nav-link text-white <?php active('order'); ?>">
        <i class="bi-cart-plus-fill me-2"></i> 
        Order
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white <?php active('pembayaran'); ?>">
        <i class="bi-credit-card-fill me-2"></i> 
        Pembayaran
        </a>
    </li>
    <?php } ?>

    <?php if($_SESSION['id_role']==2){ ?>
    <li>
        <a href="#" class="nav-link text-white <?php active('laporan'); ?>">
        <i class="bi-file-text-fill me-2"></i> 
        Laporan
        </a>
    </li>
    <?php } ?>

    </ul>
    <hr>
    <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$_SESSION['nama_user']?></strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
    </ul>
    </div>
</div>

<div class="divider"></div>