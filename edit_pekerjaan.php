<?php
// Termasuk file konfigurasi
include("koneksi.php");

// Mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// Mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM tabel_pekerjaan WHERE pekerjaan_id = '$id'");
$siswa = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pekerjaan</title>
</head>
<body>
    <h3>Data Pekerjaan</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="pekerjaan_id" value="<?php echo $siswa['pekerjaan_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama Pekerjaan</td>
                <td>
                    <input type="text" name="nama_pekerjaan"
                    value="<?php echo $siswa['nama_pekerjaan']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Nama Perushaan</td>
                <td>
                    <input type="text" name="nama_perusahaan"
                    value="<?php echo $siswa['nama_perusahaan']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>alamat</td>
                <td>
                    <input type="text" name="alamat"
                    value="<?php echo $siswa['alamat']; ?>">
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>