<?php
session_start(); // WAJIB PALING ATAS
include 'koneksi.php';

$nama = $_POST['nama'];
$kamar_id = $_POST['kamar_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$jumlah_tamu = $_POST['jumlah_tamu'];

// validasi tanggal
if ($checkout <= $checkin) {
    die("Tanggal checkout harus setelah checkin");
}

// =======================
// 🔥 CEK STOK (ANTI OVERBOOKING)
// =======================

// ambil stok kamar
$kamar = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT jumlah_unit FROM kamar WHERE id='$kamar_id'
"));

$stok = $kamar['jumlah_unit'];

// hitung booking yang bentrok tanggal
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

// cek ketersediaan
if ($terpakai >= $stok) {
    die("Maaf, kamar sudah penuh di tanggal tersebut!");
}

// =======================
// ✅ SIMPAN BOOKING
// =======================
$query = "INSERT INTO booking (nama, kamar_id, checkin, checkout, jumlah_tamu) 
VALUES ('$nama', '$kamar_id', '$checkin', '$checkout', '$jumlah_tamu')";

if (mysqli_query($conn, $query)) {

    // ambil id booking terakhir
    $booking_id = mysqli_insert_id($conn);

    // 🔥 ARAHKAN KE PEMBAYARAN (BUKAN DASHBOARD LAGI)
    header("Location: pembayaran.php?id=$booking_id");
    exit;

} else {
    echo "Error: " . mysqli_error($conn);
}
?>