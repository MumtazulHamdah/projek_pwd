<?php
session_start();
include 'koneksi.php';

// 🔐 WAJIB LOGIN
if (!isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}

$nama = $_POST['nama'];
$kamar_id = $_POST['kamar_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$jumlah_tamu = $_POST['jumlah_tamu'];

// =======================
// VALIDASI TANGGAL
// =======================
if ($checkout <= $checkin) {
    die("Tanggal checkout harus setelah checkin");
}

// =======================
// CEK STOK KAMAR
// =======================

// ambil stok
$kamar = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT jumlah_unit FROM kamar WHERE id='$kamar_id'
"));

$stok = $kamar['jumlah_unit'];

// cek bentrok
$cek = mysqli_query($conn, "
SELECT COUNT(*) as total FROM booking 
WHERE kamar_id = '$kamar_id'
AND status != 'cancelled'
AND (
    (checkin < '$checkout') AND (checkout > '$checkin')
)
");

$data = mysqli_fetch_assoc($cek);
$terpakai = $data['total'];

// kalau penuh
if ($terpakai >= $stok) {
    die("Maaf, kamar sudah penuh di tanggal tersebut!");
}

// =======================
// SIMPAN KE SESSION
// =======================
$_SESSION['booking_temp'] = [
    'user_id' => $_SESSION['user']['id'], // 🔥 penting banget
    'nama' => $nama,
    'kamar_id' => $kamar_id,
    'checkin' => $checkin,
    'checkout' => $checkout,
    'jumlah_tamu' => $jumlah_tamu
];

// ke halaman konfirmasi
header("Location: konfirmasi_data.php");
exit;