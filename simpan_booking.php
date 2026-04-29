<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['booking_temp'])) {
    die("Data tidak ditemukan!");
}

$d = $_SESSION['booking_temp'];
$user_id = $_SESSION['user']['id'];


mysqli_query($conn, "
INSERT INTO booking 
(nama, kamar_id, checkin, checkout, jumlah_tamu, user_id, status) 
VALUES (
    '{$d['nama']}',
    '{$d['kamar_id']}',
    '{$d['checkin']}',
    '{$d['checkout']}',
    '{$d['jumlah_tamu']}',
    '$user_id',
    'pending'
)
");

// ambil id booking
$booking_id = mysqli_insert_id($conn);

// hapus session
unset($_SESSION['booking_temp']);

// redirect ke pembayaran
header("Location: pembayaran.php?id=$booking_id");
exit;