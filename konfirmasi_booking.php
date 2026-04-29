<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['booking_temp'])) {
    header("Location: dashboard.php");
    exit;
}

$data = $_SESSION['booking_temp'];

// ambil data kamar
$kamar = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT * FROM kamar WHERE id='{$data['kamar_id']}'
"));

// hitung lama inap
$hari = (strtotime($data['checkout']) - strtotime($data['checkin'])) / 86400;
$total = $hari * $kamar['harga'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: url('img/hotel.jpg') no-repeat center center/cover;
    height: 100vh;
    margin: 0;
}

/* overlay gelap */
.overlay {
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.6);

    display: flex;
    justify-content: center;
    align-items: center;
}

/* card */
.confirm-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    width: 600px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

/* title */
.confirm-title {
    color: #0f2a44;
    font-weight: 600;
}

/* button */
.btn-primary {
    background-color: #0f2a44;
    border: none;
}
.btn-primary:hover {
    background-color: #081a2b;
}
</style>

</head>

<body>

<div class="overlay">

    <div class="confirm-card">

        <h3 class="text-center confirm-title mb-4">Konfirmasi Booking</h3>

        <table class="table">
            <tr><td>Nama</td><td><?= $data['nama']; ?></td></tr>
            <tr><td>Kamar</td><td><?= $kamar['nama']; ?></td></tr>
            <tr><td>Check-in</td><td><?= $data['checkin']; ?></td></tr>
            <tr><td>Check-out</td><td><?= $data['checkout']; ?></td></tr>
            <tr><td>Jumlah Tamu</td><td><?= $data['jumlah_tamu']; ?></td></tr>
            <tr><td>Lama Menginap</td><td><?= $hari; ?> malam</td></tr>
            <tr>
                <td>Total Harga</td>
                <td><b>Rp <?= number_format($total,0,',','.'); ?></b></td>
            </tr>
        </table>

        <div class="d-flex gap-3 mt-4">
            
            <!-- ulang -->
            <a href="booking.php?id=<?= $data['kamar_id']; ?>" 
               class="btn btn-danger w-50">
               Ubah Data
            </a>

            <!-- lanjut -->
            <form action="simpan_booking.php" method="POST" class="w-50">
                <button class="btn btn-primary w-100">
                    Lanjut ke Pembayaran
                </button>
            </form>

        </div>

    </div>

</div>

</body>
</html>