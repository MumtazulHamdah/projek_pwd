<?php
session_start();
include 'koneksi.php';

// 🔒 CEK LOGIN ADMIN
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// 🔒 CEK ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = (int) $_GET['id'];

// 🔒 CEK DATA ADA & STATUS MASIH VALID
$cek = mysqli_query($conn, "
SELECT status FROM booking WHERE id='$id'
");

if(mysqli_num_rows($cek) == 0){
    die("Data booking tidak ditemukan!");
}

$data = mysqli_fetch_assoc($cek);

// ❌ Kalau sudah paid → gak boleh dikonfirmasi lagi
if($data['status'] == 'paid'){
    $_SESSION['error'] = "Booking sudah dikonfirmasi sebelumnya!";
    header("Location: admin_kamar.php");
    exit;
}

// ❌ Kalau belum upload bukti (optional, kalau kamu mau ketat)
if($data['status'] == 'pending'){
    $_SESSION['error'] = "Belum ada bukti pembayaran!";
    header("Location: admin_kamar.php");
    exit;
}

// ✅ UPDATE STATUS
$update = mysqli_query($conn, "
UPDATE booking SET status='paid' WHERE id='$id'
");

// ❌ ERROR QUERY
if(!$update){
    die("Gagal update: " . mysqli_error($conn));
}

// ✅ NOTIF SUKSES
$_SESSION['success'] = "Booking berhasil dikonfirmasi";

// 🔁 BALIK KE ADMIN
header("Location: admin_kamar.php");
exit;
?>