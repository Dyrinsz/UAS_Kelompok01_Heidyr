<?php
$host = "localhost"; // Sesuaikan dengan host Anda
$username = "root"; // Sesuaikan dengan username Anda
$password = ""; // Sesuaikan dengan password Anda
$database = "perpustakaan"; // Sesuaikan dengan nama database Anda

$koneksi = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?> 