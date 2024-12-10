<?php
// menghubungkan file koneksi dengan index 
include ("koneksi.php");
session_start(); //mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pekerjaan</title>
    <style>
        /* membuat styling pada table*/
        table,th,td{
     border: 1px solid;
     border-collapse: collapse;
     padding: 10px;
        }
    </style>      
</head>
<body>
<h2>Data berhasil Di Perbarui</h2>
<!-- Tampilkan Notifikasi Jika Ada -->
<?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- Hapus notifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
<?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>Nama Pekerjaan</th>
            <th>Nama Perusahaan</th>
            <th>alamat</th>
            <th><a href="tambah_pekerjaan.php">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM tabel_pekerjaan");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada 
        table film) */
        while ($siswa =$query->fetch_assoc()){
            /* fungsi fetch_assoc digunakan untuk mengambil 
            data perulangan dalam bentuk array */
        ?>
        <!-- kode PHP ditutup untuk menyiapkan kode HTML
        yang akan di looping menggunakan while loop -->

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $siswa['nama_pekerjaan']?></td>
            <td><?php echo $siswa['nama_perusahaan']?></td>
            <td><?php echo $siswa['alamat']?></td>
        
        <td align="center">
            <!-- URL ke halaman edit data dengan menggunakan 
            parameter id pada kolom table -->
            <a href="edit_pekerjaan.php?id=<?php echo $siswa['pekerjaan_id'] ?>">Edit</a>
            <a onclick="return confirm('Anda yakin ingin menghapus data?')" 
             href="hapus_pekerjaan.php?id=<?php echo $siswa['pekerjaan_id'] ?>">Hapus</a>
        </td>
    </tr>
<?php
    } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
?>
</tbody>
</table>
<!-- Menghitung jumlah baris yang ada pada table (film) -->
<p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>