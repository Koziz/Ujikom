<?php
     // Create
    if(isset($_POST['submit'])){
        $UserID = $_SESSION['user']['id_user'];
        $BukuID = $_POST['BukuID'];

        $query = mysqli_query($koneksi, "INSERT INTO koleksipribadi (UserID, BukuID) VALUES ('$UserID', '$BukuID')");

        if($query) {
            echo '<div class="alert alert-success">Data berhasil ditambah</div>';
        }else{
            echo '<div class="alert alert-danger">Data gagal ditambah</div>';
        }
    }
    // Read
    $UserID = $_SESSION['user']['id_user'];
    $query = mysqli_query($koneksi, "SELECT * FROM koleksipribadi WHERE UserID = '$UserID'");
?>
                `
<!DOCTYPE html>
    <html lang="en">
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                    <meta name="description" content="" />
                    <meta name="author" content="" />
                    <title>Koleksi Pribadi</title>
                    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
                    <link href="css/styles.css" rel="stylesheet" />
                    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
                </head>
                <body class="sb-nav-fixed">
                    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                        <!-- Navbar Brand-->
                        <a class="navbar-brand ps-3" href="index.html">Perpustakaan Online</a>
                    </nav>
                    <div id="layoutSidenav">
                            <div class="card-body">
                                <main>
                                    <div class="container-fluid">
                                        <h1 class="mt-4">Favorit Buku</h1>
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="post">
                                                    <div class="row mb-3">
                                                        <div class="col-md-2">Buku</div>
                                                        <div class="col-md-8">
                                                            <select name="BukuID" class="form-control">
                                                                <?php
                                                                    $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                                                    while($buku = mysqli_fetch_array($buk)) {
                                                                ?>
                                                                <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <button type="submit" class="btn btn-primary" name="submit" value="submit" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Koleksi</button>
                                                     </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                
                                                <h5 class="card-title">Daftar Favorit Buku</h5>
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead class="bg-light text-black">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Judul Buku</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            while($data = mysqli_fetch_array($query)) {
                                                                $id_buku = $data['BukuID'];
                                                                $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
                                                                $judul_buku = mysqli_fetch_array($buku);
                                                        ?>
                                                       <tr>
    <th scope="row"><?php echo $no++; ?></th>
    <?php if (!empty($judul_buku['judul'])) : ?>
        <td><?php echo $judul_buku['judul']; ?></td>
    <?php else : ?>
        <td>Buku Telah dihapus oleh Perpustakaan</td>
    <?php endif; ?>
    <td>
        <a href="edit_koleksi.php?id=<?php echo $data['KoleksiID']; ?>" class="btn btn-info">Ubah</a>
        <a href="hapus_koleksi.php?id=<?php echo $data['KoleksiID']; ?>" class="btn btn-danger">Hapus</a>
    </td>
</tr>

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                                <footer class="py-4 bg-light mt-auto">
                                </footer>
                            </div>
                        </div>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                    <script src="js/scripts.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                    <script src="assets/demo/chart-area-demo.js"></script>
                    <script src="assets/demo/chart-bar-demo.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                    <script src="js/datatables-simple-demo.js"></script>
                </body>
                </html>
