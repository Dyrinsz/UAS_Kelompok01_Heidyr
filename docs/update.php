<?php
// Include file koneksi database
include 'koneksi.php';

// Inisialisasi variabel
$id = $nama = $alamat = $email = $phone_number = $jenis_buku = $judul_buku = $pengarang = $tanggal_peminjaman = $tanggal_pengembalian = '';

// Cek apakah parameter ID diterima dari URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitasi input ID
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query untuk mengambil data anggota berdasarkan ID
    $query = "SELECT * FROM anggota WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah data ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $email = $row['email'];
        $phone_number = $row['phone_number'];
        $jenis_buku = $row['jenis_buku'];
        $judul_buku = $row['judul_buku'];
        $pengarang = $row['pengarang'];
        $tanggal_peminjaman = $row['tanggal_peminjaman'];
        $tanggal_pengembalian = $row['tanggal_pengembalian'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}

// Proses update data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $phone_number = mysqli_real_escape_string($koneksi, $_POST['phone_number']);
    $jenis_buku = mysqli_real_escape_string($koneksi, $_POST['jenis_buku']);
    $judul_buku = mysqli_real_escape_string($koneksi, $_POST['judul_buku']);
    $pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
    $tanggal_peminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggal_peminjaman']);
    $tanggal_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tanggal_pengembalian']);

    // Query update data anggota
    $query_update = "UPDATE anggota SET 
                     nama = '$nama', 
                     alamat = '$alamat', 
                     email = '$email', 
                     phone_number = '$phone_number',
                     jenis_buku = '$jenis_buku',
                     judul_buku = '$judul_buku',
                     pengarang = '$pengarang',
                     tanggal_peminjaman = '$tanggal_peminjaman',
                     tanggal_pengembalian = '$tanggal_pengembalian'
                     WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query_update)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Anggota Perpustakaan</title>
    <link rel="stylesheet" href="stayle.css">
</head>
<body>
    <div class="container">
        <h1>Update Data Anggota Perpustakaan</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required><br><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <label for="phone_number">Nomor Telepon:</label><br>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required><br><br>
            <label for="jenis_buku">Jenis Buku:</label><br>
            <input type="text" id="jenis_buku" name="jenis_buku" value="<?php echo $jenis_buku; ?>" required><br><br>
            <label for="judul_buku">Judul Buku:</label><br>
            <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $judul_buku; ?>" required><br><br>
            <label for="pengarang">Pengarang:</label><br>
            <input type="text" id="pengarang" name="pengarang" value="<?php echo $pengarang; ?>" required><br><br>
            <label for="tanggal_peminjaman">Tanggal Peminjaman:</label><br>
            <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?php echo $tanggal_peminjaman; ?>" required><br><br>
            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label><br>
            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?php echo $tanggal_pengembalian; ?>" required><br><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>