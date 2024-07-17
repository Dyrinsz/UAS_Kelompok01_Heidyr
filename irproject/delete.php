<?php
include 'koneksi.php';

$type = $_GET['type'];
$id = $_GET['id'];

if ($type == 'anggota') {
    $query = "DELETE FROM anggota WHERE id='$id'";
}

if (mysqli_query($koneksi, $query)) {
    header('Location: index.php');
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}
?>