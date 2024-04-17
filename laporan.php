<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1 class="mt-4">Laporan Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" id="searchInput" placeholder="Cari...">
                    <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak
                        Data</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Koneksi ke database, Anda perlu menyesuaikan dengan informasi database Anda
                           
                            if (!$koneksi) {
                                die("Koneksi database gagal: " . mysqli_connect_error());
                            }

                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['tanggal_peminjaman']; ?></td>
                                    <td><?php echo $data['tanggal_pengembalian']; ?></td>
                                    <td><?php echo $data['status_peminjaman']; ?></td>
                                    <td>
                                        <a href="hapus_laporan.php?hapus_id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('dataTable');
        const tableRows = table.getElementsByTagName('tr');

        searchInput.addEventListener('input', function() {
            const searchString = this.value.toLowerCase();

            for (let i = 1; i < tableRows.length; i++) {
                const rowData = tableRows[i].getElementsByTagName('td');
                let found = false;
                for (let j = 1; j < rowData.length; j++) { // Mulai dari indeks 1 untuk melewati kolom Nomor
                    const cellData = rowData[j].textContent.toLowerCase();
                    if (cellData.includes(searchString)) {
                        found = true;
                        break;
                    }
                }
                if (found) {
                    tableRows[i].style.display = '';
                } else {
                    tableRows[i].style.display = 'none';
                }
            }
        });
    });
</script>

</body>

</html>
