<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}
include 'koneksi.php';
if (!isset($_GET['id'])) {
    die("ID kamar tidak ditemukan!");
}
$id = (int) $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kamar WHERE id=$id");
$k = mysqli_fetch_assoc($query);
$today = date('Y-m-d');
$q = mysqli_query($conn, "
SELECT COUNT(*) as total FROM booking 
WHERE kamar_id = $id
AND status != 'cancelled'
AND (checkin <= '$today' AND checkout > '$today')
");
$data = mysqli_fetch_assoc($q);
$sisa = $k['jumlah_unit'] - $data['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Kamar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/booking.css?">
</head>
<body>

<div class="overlay d-flex justify-content-center align-items-center">
    <div class="card booking-card">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="<?= $k['gambar']; ?>" class="img-fluid room-img">
            <div class="col-md-7 p-4 bg-white">
                <h3 class="mb-3"><?= $k['nama']; ?></h3>
                <p class="text-muted"><?= $k['deskripsi']; ?></p>
                <p class="price">
                    Rp <?= number_format($k['harga'],0,',','.'); ?> / malam
                </p>
                <hr>
                <form action="proses_booking.php" method="POST">
                    <input type="hidden" name="kamar_id" value="<?= $k['id']; ?>">

                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Check-in</label>
                            <input type="date" name="checkin" class="form-control" min="<?= date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Check-out</label>
                            <input type="date" name="checkout" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu" class="form-control" min="1" required>
                    </div>
                    <?php if($sisa > 0): ?>
                        <button type="submit" class="btn btn-primary w-100">
                            Booking Sekarang
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn btn-secondary w-100" disabled>
                            Kamar Penuh
                        </button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>