<?php
$servername = "localhost";
$database = "final_project";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$konek = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$konek) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//echo "Koneksi berhasil";


?>