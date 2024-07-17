<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="stayle.css">
    <script>
        function confirmPrint() {
            return confirm("Apakah Anda yakin ingin mencetak data anggota perpustakaan?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Data Anggota Perpustakaan</h1>
        <a href="create.php" style="background-color: seashell">Tambah Data Anggota</a>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $query = "SELECT * FROM anggota";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) { 
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['jenis_buku'] . "</td>";
                    echo "<td>" . $row['judul_buku'] . "</td>";
                    echo "<td>" . $row['pengarang'] . "</td>";
                    echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
                    echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                    echo "<td>";
                    echo "<a href='update.php?type=anggota&id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='delete.php?type=anggota&id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";

                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button class="btn" onclick="window.print()">Print</button>
    </div>
</body>
</html>