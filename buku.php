
<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
    <input type="text" id="searchInput" placeholder="Cari...">
        <a href="?page=buku_tambah" class="btn btn-primary m-2">+ Tambah Data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                while($data = mysqli_fetch_array($query)){
                ?>
                <tr> 
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['penulis']; ?></td>
                    <td><?php echo $data['penerbit']; ?></td>
                    <td><?php echo $data['tahun_terbit']; ?></td>
                    <td>
                        <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">Ubah</a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
        </table>
    </div>
</div>
    </div>
</div>
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