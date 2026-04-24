<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$kamar_id = $_POST['kamar_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$jumlah_tamu = $_POST['jumlah_tamu'];

$query = "INSERT INTO booking (nama, kamar_id, checkin, checkout, jumlah_tamu) VALUES ('$nama', '$kamar_id', '$checkin', '$checkout', '$jumlah_tamu')";

if (mysqli_query($conn, $query)) {
    echo "Booking berhasil!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>