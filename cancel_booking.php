<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

// ambil parameter
$id   = $_GET['id'] ?? null;
$tipe = $_GET['tipe'] ?? null;

if (!$id || !$tipe) {
    $_SESSION['error'] = "Data tidak valid!";
    header("Location: riwayat.php");
    exit;
}

// 🔥 tentukan tabel (AMAN)
$tabel = ($tipe == 'fasilitas') ? 'booking_fasilitas' : 'booking';

// ambil data
$cek = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT * FROM $tabel WHERE id='$id'
"));

// ❌ kalau ga ada
if (!$cek) {
    $_SESSION['error'] = "Data tidak ditemukan!";
    header("Location: riwayat.php");
    exit;
}

// ❌ bukan punya user
if ($cek['user_id'] != $user_id) {
    $_SESSION['error'] = "Akses ditolak!";
    header("Location: riwayat.php");
    exit;
}

// ❌ kalau sudah paid / cancelled
if ($cek['status'] == 'paid' || $cek['status'] == 'cancelled') {
    $_SESSION['error'] = "Booking tidak bisa dibatalkan!";
    header("Location: riwayat.php");
    exit;
}

// ✅ cancel
mysqli_query($conn, "
UPDATE $tabel SET status='cancelled' WHERE id='$id'
");

$_SESSION['success'] = true;

header("Location: riwayat.php");
exit;