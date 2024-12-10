<?php
session_start(); // Mulai sesi
// Menghubungkan file ini dengan file konfigurasi database
include("koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if (isset($_POST['simpan'])) {
    /* Mengambil nilai dari form input
       dan menyimpannya ke dalam variabel */
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat'];

    // Menyusun query SQL untuk menambahkan data ke tabel 'film'
    $sql = "INSERT INTO tabel_pekerjaan
            (nama_pekerjaan, nama_perusahaan, alamat)
            VALUES ('$nama_pekerjaan', '$nama_perusahaan', '$alamat')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data pekerjaan berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data pekerjaan gagal ditambahkan!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>