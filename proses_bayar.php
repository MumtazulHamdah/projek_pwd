<?php
session_start();
include 'koneksi.php';

$booking_id = $_POST['booking_id'];
$metode = $_POST['metode'];

$bukti = "";

// 🔥 CEK METODE
if ($metode != "Bayar di Tempat") {

    // wajib upload bukti
    if ($_FILES['bukti']['name'] == "") {
        die("Bukti transfer wajib diupload!");
    }

    $bukti = $_FILES['bukti']['name'];
    move_uploaded_file($_FILES['bukti']['tmp_name'], "bukti/" . $bukti);

    // status langsung paid
    $status = "menunggu_konfirmasi";

} else {

    // bayar di tempat → ga perlu bukti
    $bukti = "";
    $status = "pending"; // nunggu dibayar di hotel
}

// simpan ke tabel pembayaran
mysqli_query($conn, "
INSERT INTO pembayaran (booking_id, metode, bukti_transfer) 
VALUES ('$booking_id', '$metode', '$bukti')
");

// update status booking sesuai metode
mysqli_query($conn, "
UPDATE booking SET status='$status' WHERE id='$booking_id'
");

// notif dashboard
$_SESSION['success'] = true;

// balik ke dashboard
header("Location: dashboard.php");
exit;
?>