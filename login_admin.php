<?php
session_start();
include 'koneksi.php';
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);
    if($data){
        // kalau pakai password biasa (punyamu sekarang)
        if($password == $data['password']){
            $_SESSION['admin'] = $data['username'];
            header("Location: admin.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: url('img/hotel.jpg') no-repeat center center/cover;
    height: 100vh;
    margin: 0;
}

.overlay {
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.6);
}

.login-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    width: 360px;
    z-index: 2;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.login-title {
    font-weight: 600;
    color: #0f2a44;
}

.btn-login {
    background: #0f2a44;
    color: white;
    border-radius: 8px;
}

.btn-login:hover {
    background: #081a2b;
}
</style>
</head>

<body>
<div class="overlay d-flex justify-content-center align-items-center">
    <div class="login-card">
        <h3 class="text-center login-title mb-3">Admin Login</h3>
        <p class="text-center text-muted mb-4">Ombak Biru Hotel System</p>
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-login w-100">
                Login
            </button>
        </form>
    </div>
</div>
</body>
</html>