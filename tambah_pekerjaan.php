<!DOCTYPE html>
<html>
<head>
    <title>Data Pekerjaan</title>
</head>
<body>
    <h3>Tambah Data Pekerjaan</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama Pekerjaan</td>
                <td><input type="text" name="nama_pekerjaan" required></td>
            </tr>
            <tr>
                <td>Nama perusahaan</td>
                <td><input type="text" name="nama_perusahaan" required></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </form>
</body>
</html>