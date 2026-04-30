<?php
session_start();
include 'koneksi.php';

$error = "";

if(isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // cek user
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($cek) > 0){

        $user = mysqli_fetch_assoc($cek);

        // cek password pakai hash
        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }

    } else {

        // HASH password dulu
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // AUTO REGISTER
        mysqli_query($conn, "
            INSERT INTO users (username, password)
            VALUES ('$username', '$hash')
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