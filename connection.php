<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "db_cafe";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error){
	echo 'Gagal koneksi ke database';
} else {
	//koneksi berhsil
}

?>