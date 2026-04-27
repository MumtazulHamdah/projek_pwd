<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID kamar tidak ditemukan!");
}

$id = (int) $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kamar WHERE id=$id");
$k = mysqli_fetch_assoc($query);

// =======================
// 🔥 TAMBAHAN LOGIKA
// =======================
$today = date('Y-m-d');

// hitung kamar yang sedang dipakai
$q = mysqli_query($conn, "
SELECT COUNT(*) as total FROM booking 
WHERE kamar_id = $id
AND status != 'cancelled'
AND (checkin <= '$today' AND checkout > '$today')
");

$data = mysqli_fetch_assoc($q);

// hitung sisa kamar
$sisa = $k['jumlah_unit'] - $data['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Kamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

<style>
    body {
        background: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    .booking-card {
        border-radius: 15px;
        overflow: hidden;
    }

    .room-img {
        height: 100%;
        object-fit: cover;
    }

    .price {
        color: #c8a96a;
        font-weight: bold;
        font-size: 20px;
    }

    .btn-primary {
        background-color: #0f2a44;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0c1f33;
    }
</style>
</head>

<div class="container py-5">
    <div class="card booking-card shadow-lg">
        <div class="row g-0">

            <!-- IMAGE -->
            <div class="col-md-5">
                <img src="<?= $k['gambar']; ?>" class="img-fluid room-img">
            </div>

            <!-- FORM -->
            <div class="col-md-7 p-4">

                <h3 class="mb-3"><?= $k['nama']; ?></h3>
                <p class="text-muted"><?= $k['deskripsi']; ?></p>

                <p class="price">
                    Rp <?= number_format($k['harga'],0,',','.'); ?> / malam
                </p>
                <hr>

                <form action="proses_booking.php" method="POST">
                    <input type="hidden" name="kamar_id" value="<?= $k['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
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

                    <!-- 🔥 LOGIKA BUTTON -->
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