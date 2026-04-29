<?php
session_start();
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = "";

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek user
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($cek) > 0){

        $user = mysqli_fetch_assoc($cek);

        if($user['password'] == $password){
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }

    } else {

        // AUTO REGISTER
        mysqli_query($conn, "
        INSERT INTO users (username, password)
        VALUES ('$username', '$password')
        ");

        $user = mysqli_fetch_assoc(mysqli_query($conn, "
        SELECT * FROM users WHERE username='$username'
        "));

        $_SESSION['user'] = $user;

        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: url('img/hotel.jpg') no-repeat center center/cover;
    height: 100vh;
    margin: 0;
}

.overlay {
    background: rgba(0,0,0,0.6);
    height: 100%;
}

.login-card {
    width: 350px;
    border-radius: 15px;
}
</style>
</head>

<body>

<div class="overlay d-flex justify-content-center align-items-center">

    <div class="card login-card p-4 shadow">
        <h3 class="text-center mb-3">Login User</h3>

        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" name="login" class="btn btn-primary w-100">
                Login / Daftar
            </button>
        </form>
    </div>

</div>

</body>
</html>