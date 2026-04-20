<?php
session_start();
include 'koneksi.php';

// validasi iniput
if (empty($_POST['username']) || empty($_POST['password'])) {
    header("Location: login.php?error=Data harus diisi");
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

// statemen prepared
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

// cek login
if ($data && password_verify($password, $data['password'])) {
    $_SESSION['user'] = [
        'id' => $data['id'],
        'username' => $data['username']
    ];

    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php?error=Username atau password salah");
    exit;
}
?>