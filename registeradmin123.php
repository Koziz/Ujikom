<?php
    include "koneksi.php";

    if(isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Encrypt password with md5 for simplicity
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $level = $_POST['level'];

        // Insert user data into database
        $result = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, email, alamat, level) 
                                          VALUES('$nama', '$username', '$password', '$email', '$alamat', '$level')");
        if($result) {
            echo '<script>alert("Registrasi berhasil. Silakan login."); location.href="login.php";</script>';
        } else {
            echo '<script>alert("Registrasi gagal. Silakan coba lagi.");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Register</h3>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="level">Konfirmasi:</label>
                            <select name="level" id="level" class="form-control">
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="register" class="form-control btn btn-primary submit px-3">Register</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p>Sudah punya akun ? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
