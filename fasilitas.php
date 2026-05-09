<?php 
session_start(); 
include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - Ombak Biru Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fasilitas.css">

</head>
<body>
<header class="navbar-custom d-flex align-items-center justify-content-between px-3">
    <div class="logo">
        <a href="dashboard.php">
            <img src="img/logo.png" alt="Logo">
        </a>
    </div>
    <div class="menu">
        <a href="dashboard.php">Home</a>
        <a href="dashboard.php#rooms">Rooms</a>
        <a href="fasilitas.php" class="active">Facilities</a>
        <a href="fasilitas.php#location">Location</a>
        <a href="fasilitas.php#location">Contact Us</a>
    </div>

    <div class="d-flex align-items-center">
        <a href="#fasilitas" class="btn-book">BOOK NOW</a>
        <?php if(isset($_SESSION['user'])): ?>
    <div class="dropdown ms-3">
        <a href="#" 
           class="d-flex align-items-center text-decoration-none fw-semibold text-dark"
           data-bs-toggle="dropdown">
            <?= $_SESSION['user']['username']; ?>
            <i class="bi bi-person-circle ms-2"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="riwayat.php">My Booking</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
        </ul>
    </div>
<?php else: ?>
    <a href="login_user.php" class="btn-book ms-2">Login</a>
<?php endif; ?>
</header>
<div class="hero-facilities">
    <div class="hero-overlay">
        <div>
            <h1>Our Facilities</h1>
            <p>Nikmati fasilitas terbaik dari Ombak Biru Hotel</p>
        </div>
    </div>
</div>

<div class="container my-5" id="fasilitas">
    <div class="text-center mb-5">
        <h2>Fasilitas Hotel</h2>
        <p class="text-muted">Kami menyediakan fasilitas lengkap untuk kenyamanan Anda</p>
    </div>
    <div class="row g-4">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM fasilitas");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="col-md-4">
            <div class="facility-card overlay-card">
                <img src="img/<?php echo $row['gambar']; ?>">
                <div class="overlay">
                    <i class="bi <?php echo $row['icon']; ?>"></i>
                    <h5><?php echo $row['nama']; ?></h5>
                    <p><?php echo $row['deskripsi']; ?></p>
                    <span>Rp <?php echo $row['harga']; ?></span>
                    <a href="booking_fasilitas.php?id=<?php echo $row['id']; ?>" class="btn btn-warning mt-2">Book Now</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="container my-5">
    <h2 class="text-center mb-4">Swimming Pool</h2>
    <p class="text-center text-muted mb-5">Kolam renang dengan view laut</p>
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="facility-card luxury">
                <img src="img/swimming-pool.jpg">
                <div class="overlay"> 
                    <h5 class="text-white">Swimming Pool</h4>
                    <p>Fasilitas umum bagi tamu yang menginap</p>
                </div>
            </div>
        </div>
        </div>
        </div>
<footer class="footer-custom text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold">Ombak Biru Hotel</h4>
                <p>Nikmati kenyamanan menginap dengan pemandangan laut yang indah dan suasana tenang.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">Facilities</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4" id="location" >
                <h5 class="fw-bold">Contact</h5>
                <p>📍 Yogyakarta, Indonesia</p>
                <p>📞 0812-3456-7890</p>
                <p>✉️ ombakbiru@email.com</p>
                <div class="social-icons mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="login_admin.php" class="icon-user"><i class="bi bi-person-fill"></i></a>
                </div>
            </div>
        </div>
        <hr class="bg-light">
        <p class="text-center small mb-0">
            &copy; 2026 Ombak Biru Hotel | All Rights Reserved
        </p>
    </div>
</footer>
</body>
</html>