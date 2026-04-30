<?php
session_start();
include 'koneksi.php';

$user_id = $_SESSION['user']['id'] ?? null;

if (!$user_id) {
    header("Location: login_user.php");
    exit;
}

$booking = mysqli_query($conn, "
SELECT booking.*, kamar.nama AS nama_kamar 
FROM booking 
JOIN kamar ON booking.kamar_id = kamar.id
WHERE booking.user_id = '$user_id'
ORDER BY booking.id DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f8f9fa;
    padding-top: 80px;
}

/* ===== NAVBAR ===== */
.navbar-custom {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;

    display: flex;
    align-items: center;

    padding: 12px 60px;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.logo img {
    height: 50px;
}

.nav-title {
    font-size: 18px;
    font-weight: 600;
    margin-left: 10px;
    color: #333;
}

/* ===== HERO FULL ===== */
.hero-section {
    width: 100%;
    height: 100vh;
    background: url('img/hotel.jpg') center / cover no-repeat;
    position: relative;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
}

/* ===== WRAPPER TABEL ===== */
.riwayat-wrapper {
    display: flex;
    justify-content: center;
    margin-top: -350px; /* 🔥 atur naik turun disini */
    padding: 0 20px;
}

.riwayat-box {
    width: 100%;
    max-width: 1100px;
}

/* CARD */
.card {
    border-radius: 15px;
    overflow: hidden;
}

/* TABLE */
.table th {
    background: #0d6efd;
    color: white;
}

/* BUTTON DISABLE STYLE */
.btn-disabled {
    background: #ccc;
    border: none;
    cursor: not-allowed;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header class="navbar-custom">
    <div class="d-flex align-items-center">
        <a href="dashboard.php" class="logo">
            <img src="img/logo.png">
        </a>
        <span class="nav-title">My Booking</span>
    </div>
</header>

<!-- HERO -->
<div class="hero-section">
    <div class="overlay"></div>
</div>

<!-- ===== TABEL ===== -->
<div class="riwayat-wrapper">

<div class="riwayat-box">
<div class="card shadow-lg">
<div class="card-body p-0">

<table class="table table-bordered text-center mb-0">
<thead>
<tr>
    <th>Nama</th>
    <th>Kamar</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php while($row = mysqli_fetch_assoc($booking)) : ?>
<tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['nama_kamar']; ?></td>
    <td><?= $row['checkin']; ?> - <?= $row['checkout']; ?></td>

    <td>
        <?php if($row['status'] == 'pending'): ?>
            <span class="badge bg-warning">Pending</span>
        <?php elseif($row['status'] == 'menunggu_konfirmasi'): ?>
            <span class="badge bg-info">Menunggu</span>
        <?php elseif($row['status'] == 'paid'): ?>
            <span class="badge bg-success">Paid</span>
        <?php elseif($row['status'] == 'cancelled'): ?>
            <span class="badge bg-danger">Cancelled</span>
        <?php endif; ?>
    </td>

    <td>
        <?php if($row['status'] == 'pending' || $row['status'] == 'menunggu_konfirmasi'): ?>
            
            <a href="cancel_booking.php?id=<?= $row['id']; ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin mau cancel booking?')">
               Cancel
            </a>

        <?php else: ?>
            
            <button class="btn btn-disabled btn-sm" disabled>
                Tidak bisa dibatalkan
            </button>

        <?php endif; ?>
    </td>

</tr>
<?php endwhile; ?>
</tbody>

</table>

</div>
</div>
</div>

</div>

<!-- ===== ALERT ===== -->
<?php if(isset($_SESSION['success'])) { ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Booking berhasil dibatalkan',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php unset($_SESSION['success']); } ?>

<?php if(isset($_SESSION['error'])) { ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: '<?= $_SESSION['error']; ?>',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php unset($_SESSION['error']); } ?>

</body>
</html>