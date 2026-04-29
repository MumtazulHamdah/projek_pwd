<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("LOCATION: login_admin.php");
    exit;
}

// 🔔 NOTIF (hanya pending)
$notif = mysqli_query($conn, "
SELECT COUNT(*) as total FROM booking 
WHERE status='pending'
");
$n = mysqli_fetch_assoc($notif);

// DATA BOOKING
$data = mysqli_query($conn, "
SELECT booking.*, kamar.nama AS nama_kamar, pembayaran.bukti_transfer 
FROM booking 
JOIN kamar ON booking.kamar_id = kamar.id
LEFT JOIN pembayaran ON booking.id = pembayaran.booking_id
ORDER BY booking.id DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f8f9fa;
}

.navbar-custom {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: white;
    padding: 12px 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.navbar-title {
    font-weight: 600;
    color: #0f2a44;
}

.navbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.badge-notif {
    background: red;
    color: white;
    padding: 5px 10px;
    border-radius: 50%;
    font-size: 12px;
}

.hero {
    height: 300px;
    background: url('img/hotel.jpg') center/cover no-repeat;
    position: relative;
}

.hero .overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero h2 {
    color: white;
    font-weight: 600;
}

.content {
    margin-top: 30px;
}

.card {
    border-radius: 12px;
}

.table img {
    border-radius: 6px;
}

.btn-success {
    background: #0f2a44;
    border: none;
}
.btn-success:hover {
    background: #081a2b;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar-custom">
    <div class="navbar-title">Admin Ombak Biru</div>

    <div class="navbar-right">
        🔔 <span class="badge-notif"><?= $n['total']; ?></span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</div>

<!-- HERO -->
<div class="hero">
    <div class="overlay">
        <h2>Dashboard Admin</h2>
    </div>
</div>

<!-- CONTENT -->
<div class="container content">

<?php if($n['total'] > 0): ?>
<div class="alert alert-warning mt-4">
    🔔 Ada <?= $n['total']; ?> booking perlu dicek!
</div>
<?php endif; ?>

<div class="card shadow mt-3">
<div class="card-body">

<h4 class="mb-4">Data Booking</h4>

<table class="table table-bordered">
<thead>
<tr>
    <th>Nama</th>
    <th>Kamar</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Bukti</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php while($row = mysqli_fetch_assoc($data)) : ?>
<tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['nama_kamar']; ?></td>
    <td><?= $row['checkin']; ?> - <?= $row['checkout']; ?></td>

    <td>
        <?php if($row['status'] == 'pending'): ?>
            <span class="badge bg-warning">Pending</span>
        <?php elseif($row['status'] == 'paid'): ?>
            <span class="badge bg-success">Paid</span>
        <?php elseif($row['status'] == 'cancelled'): ?>
            <span class="badge bg-danger">Cancelled</span>
        <?php endif; ?>
    </td>

    <td>
        <?php if($row['bukti_transfer']) : ?>
            <a href="bukti/<?= $row['bukti_transfer']; ?>" target="_blank">
                <img src="bukti/<?= $row['bukti_transfer']; ?>" width="60">
            </a>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>

    <td>
        <?php if($row['status'] == 'pending'): ?>
            <a href="konfirmasi_booking.php?id=<?= $row['id']; ?>" 
               class="btn btn-success btn-sm">
               Konfirmasi
            </a>
        <?php elseif($row['status'] == 'paid'): ?>
            ✔
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>
</tbody>

</table>

</div>
</div>

</div>

<meta http-equiv="refresh" content="10">

</body>
</html>