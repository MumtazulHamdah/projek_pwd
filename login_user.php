<?php
session_start();
include 'koneksi.php';
$error = "";
if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        $user = mysqli_fetch_assoc($cek);
        if (
            $password == $user['password'] || 
            password_verify($password, $user['password'])
        ) {

            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Akun belum terdaftar! Silakan daftar dulu.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/auth.css">
</head>
<body>
<div class="overlay d-flex justify-content-center align-items-center">
    <div class="auth-card">
        <h3 class="text-center auth-title mb-3">Login User</h3>
        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <label for ="username">Username</label>
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <label for ="password">Password</label>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary w-100">
                Login
            </button>
        </form>
        <p class="text-center mt-3">
            Belum punya akun? 
        <a href="register.php">Daftar</a></p>
    </div>
</div>
</body>
</html>