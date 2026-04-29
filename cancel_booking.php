<?php
session_start();
include 'koneksi.php';

// 🔒 HARUS LOGIN USER
if (!isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

// 🔒 CEK ID
if (!isset($_GET['id'])) {
    header("Location: riwayat.php");
    exit;
}

$id = (int) $_GET['id'];

// 🔍 AMBIL DATA BOOKING
$cek = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT * FROM booking WHERE id='$id'
"));

// ❌ KALO DATA GA ADA
if (!$cek) {
    $_SESSION['error'] = "Data tidak ditemukan!";
    header("Location: riwayat.php");
    exit;
}

// ❌ CEK PUNYA SIAPA (ANTI HACK)
if ($cek['user_id'] != $user_id) {
    $_SESSION['error'] = "Akses ditolak!";
    header("Location: riwayat.php");
    exit;
}

// ❌ KALO SUDAH PAID / CANCELLED
if ($cek['status'] == 'paid' || $cek['status'] == 'cancelled') {
    $_SESSION['error'] = "Booking tidak bisa dibatalkan!";
    header("Location: riwayat.php");
    exit;
}

// ✅ BARU BOLEH CANCEL
mysqli_query($conn, "
UPDATE booking SET status='cancelled' WHERE id='$id'
");

$_SESSION['success'] = true;

header("Location: riwayat.php");
exit;