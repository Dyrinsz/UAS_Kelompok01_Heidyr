<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Anggota</title>
    <link rel="stylesheet" type="text/css" href="stayle.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Anggota</h1>
        <?php
        include 'koneksi.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = $_POST['type'];
            if ($type == 'anggota') {
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $jenis_buku = $_POST['jenis_buku'];
                $judul_buku = $_POST['judul_buku'];
                $pengarang = $_POST['pengarang'];
                $tanggal_peminjaman = $_POST['tanggal_peminjaman'] ? $_POST['tanggal_peminjaman'] : NULL;
                $tanggal_pengembalian = $_POST['tanggal_pengembalian'] ? $_POST['tanggal_pengembalian'] : NULL;

                $query = "INSERT INTO anggota (nama, alamat, email, phone_number, jenis_buku, judul_buku, pengarang, tanggal_peminjaman, tanggal_pengembalian) VALUES ('$nama', '$alamat', '$email', '$phone_number', '$jenis_buku', '$judul_buku', '$pengarang', '$tanggal_peminjaman', '$tanggal_pengembalian')";
                
                if (mysqli_query($koneksi, $query)) {
                    echo "Data berhasil ditambahkan!";
                    echo "<br><a href='index.php'>Kembali ke Daftar Anggota</a>";
                    exit(); // Hentikan eksekusi script setelah berhasil menyimpan data
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                }
            }
        }
        ?>
        
        <form method="POST">
            <input type="hidden" name="type" value="anggota">
            <label>Nama: <input type="text" name="nama" required></label><br>
            <label>Alamat: <input type="text" name="alamat" required></label><br>
            <label>Email: <input type="email" name="email" required></label><br>
            <label>Nomor Telepon: <input type="text" name="phone_number" required></label><br>
            <label>Jenis Buku: <input type="text" name="jenis_buku" required></label><br>
            <label>Judul Buku: <input type="text" name="judul_buku" required></label><br>
            <label>Pengarang: <input type="text" name="pengarang" required></label><br>
            <label>Tanggal Peminjaman: <input type="date" name="tanggal_peminjaman"></label><br>
            <label>Tanggal Pengembalian: <input type="date" name="tanggal_pengembalian"></label><br>
            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>