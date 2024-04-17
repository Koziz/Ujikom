<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="text" id="searchInput" placeholder="Cari...">
                <a href="?page=ulasan_tambah" class="btn btn-primary m-2">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Ulasan</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM ulasan LEFT JOIN user ON user.id_user = ulasan.id_user LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");
                        while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr> 
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>
                                <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
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
