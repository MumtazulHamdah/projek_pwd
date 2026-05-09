<?php
session_start();
include 'koneksi.php';
$error = "";
if(isset($_POST['register'])) {
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        $_SESSION['error'] = "Akun sudah ada, silakan login!";
        header("Location: login_user.php");
        exit;

    } else {

        mysqli_query($conn, "
            INSERT INTO users (username, password, nama_lengkap)
            VALUES ('$username', '$password', '$nama_lengkap')
        ");
        $_SESSION['success'] = "Berhasil daftar, silakan login!";
        header("Location: login_user.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/auth.css">
</head>
<body>
<div class="overlay d-flex justify-content-center align-items-center">
    <div class="auth-card">
        <h3 class="text-center auth-title mb-3">Register</h3>
        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <label for ="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control mb-3" placeholder="Nama Lengkap" required>
            <label for ="username">Username</label>
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <label for ="password">Password</label>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" name="register" class="btn btn-primary w-100">
                Daftar
            </button>
        </form>
        <p class="text-center mt-3">
            Sudah punya akun? 
    <a href="login_user.php">Login</a></p>
    </div>
</div>
</body>
</html>