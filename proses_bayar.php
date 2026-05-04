<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}
$user_id = $_SESSION['user']['id'];
$id     = $_POST['booking_id']; // ID booking / booking_fasilitas
$tipe   = $_POST['tipe'];       // kamar / fasilitas
$metode = $_POST['metode'];
$bukti  = "";


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
INSERT INTO pembayaran (user_id, metode, bukti_transfer, status) 
VALUES ('$user_id', '$metode', '$bukti', '$status')
");

$pembayaran_id = mysqli_insert_id($conn);

if ($tipe == 'fasilitas') {

    mysqli_query($conn, "
    UPDATE booking_fasilitas 
    SET pembayaran_id = '$pembayaran_id', status = '$status'
    WHERE id = '$id'
    ");

} else {

    mysqli_query($conn, "
    UPDATE booking 
    SET pembayaran_id = '$pembayaran_id', status = '$status'
    WHERE id = '$id'
    ");
}
// update status booking sesuai metode

// notif dashboard
$_SESSION['success'] = true;

// balik ke dashboard
header("Location: dashboard.php");
exit;
?>