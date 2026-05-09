<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['user'])){
    header("Location: login_user.php");
    exit;
}
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fasilitas WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Fasilitas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: url('img/hotel.jpg') no-repeat center center/cover;
    height: 100vh;
    margin: 0;
}

.overlay {
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.6);
}

.booking-card {
    border-radius: 15px;
    overflow: hidden;
    width: 900px;
    z-index: 2;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    animation: fadeIn 0.5s ease;
}

.facility-img {
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

@keyframes fadeIn {
    from {opacity:0; transform: translateY(20px);}
    to {opacity:1; transform: translateY(0);}
}
</style>
</head>
<body>
<div class="overlay d-flex justify-content-center align-items-center">
    <div class="card booking-card">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="img/<?= $data['gambar']; ?>" class="img-fluid facility-img">
            </div>
            <div class="col-md-7 p-4 bg-white">
                <h3 class="mb-3"><?= $data['nama']; ?></h3>
                <p class="text-muted"><?= $data['deskripsi']; ?></p>
                <p class="price">
                    Rp <?= number_format($data['harga'],0,',','.'); ?>
                </p>
                <hr>
                <form action="proses_booking_fasilitas.php" method="POST">
                    <input type="hidden" name="fasilitas_id" value="<?= $id ?>">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id']; ?>">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        Booking Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

</body>
</html>