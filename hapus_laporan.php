<?php
// Koneksi ke database, Anda perlu menyesuaikan dengan informasi database Anda
include "koneksi.php";
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Cek apakah ada permintaan untuk menghapus
if (isset($_GET['hapus_id'])) {
    // Mengambil ID yang akan dihapus
    $hapus_id = $_GET['hapus_id'];

    // Lakukan proses hapus di database sesuai dengan ID yang dipilih
    $query_hapus = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman = '$hapus_id'");

    if ($query_hapus) {
        // Jika penghapusan berhasil, redirect kembali ke halaman laporan
        header("Location: index.php?page=laporan");
        exit(); // Penting untuk menghentikan eksekusi script setelah melakukan redirect
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Gagal menghapus data.";
    }
}
?>
