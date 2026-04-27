<?php
session_start();
include 'koneksi.php';

$booking_id = $_POST['booking_id'];
$metode = $_POST['metode'];

$bukti = "";

// upload file (kalau ada)
if ($_FILES['bukti']['name'] != "") {
    $bukti = $_FILES['bukti']['name'];
    move_uploaded_file($_FILES['bukti']['tmp_name'], "bukti/" . $bukti);
}

// simpan ke tabel pembayaran
mysqli_query($conn, "
INSERT INTO pembayaran (booking_id, metode, bukti_transfer) 
VALUES ('$booking_id', '$metode', '$bukti')
");

// update status booking
mysqli_query($conn, "
UPDATE booking SET status='paid' WHERE id='$booking_id'
");

// notif dashboard
$_SESSION['success'] = true;

// balik ke dashboard
header("Location: dashboard.php");