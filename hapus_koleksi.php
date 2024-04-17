<?php
include "koneksi.php"; // Impor file koneksi.php untuk mendapatkan koneksi ke database

$id = $_GET['id'];

// Pastikan koneksi berhasil sebelum menggunakan mysqli_query
if ($koneksi) {
    $query = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE KoleksiID=$id");

    if ($query) {
        echo '<script>alert("Hapus data berhasil");</script>';
        echo '<script>location.href = "index.php?page=koleksipribadi";</script>';
    } else {
        echo '<script>alert("Hapus data gagal");</script>';
    }
} else {
    echo "Koneksi database gagal!";
}
?>
