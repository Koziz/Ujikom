<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <input type="text" id="searchInput" placeholder="Cari...">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=kategori_tambah" class="btn btn-primary m-2">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr> 
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td>
                            <a href="?page=kategori_ubah&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-info">Ubah</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
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
