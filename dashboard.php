<?php
session_start();
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM kamar");
$kamar = mysqli_fetch_all($query, MYSQLI_ASSOC);

// ambil user_id (aman)
$user_id = $_SESSION['user']['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ombak Biru Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dashboard.css?v=1000">
</head>
<body>

<header class="navbar-custom d-flex align-items-center justify-content-between px-3">
    <div class="logo">
        <a href="dashboard.php">
            <img src="img/logo.png" alt="Logo">
        </a>
    </div>
    <div class="menu">
        <a href="#home" class="active">Home</a>
        <a href="#rooms">Rooms</a>
        <a href="fasilitas.php">Facilities</a>
        <a href="#location">Location</a>
        <a href="#location">Contact Us</a>
    </div>

    <div class="d-flex align-items-center">
        <a href="#rooms" class="btn-book">BOOK NOW</a>

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
    </div>
</header>

<main>

<div class="hero-section" id="home">
    <div class="overlay">
        <div class="hero-content">
            <h1>Welcome to Ombak Biru Hotel</h1>
            <p>Nikmati kenyamanan dengan pemandangan laut</p>
        </div>
    </div>
</div>

<div class="about-section text-center my-5">
    <div class="title-line">
        <span></span>
        <h2>Ombak Biru Hotel</h2>
        <span></span>
    </div>
    <p>
        Ombak Biru Hotel adalah hotel nyaman yang terletak di dekat kawasan laut dengan pemandangan pantai yang memukau. Dikelilingi oleh keindahan alam yang mempesona, hotel ini menawarkan suasana tenang dan segar yang cocok untuk melepas penat. Dengan fasilitas lengkap dan pelayanan terbaik, Ombak Biru Hotel menjadi pilihan ideal untuk liburan santai maupun perjalanan bisnis, sambil menikmati panorama laut yang indah setiap hari.
    </p>
</div>

<div class="container kamar text-center my-5" id="rooms">
    <h2 class="mb-5 fw-bold">Pilihan Kamar</h2>
    <div class="row g-4">

    <?php foreach($kamar as $k) : ?>
    <?php
    $today = date('Y-m-d');

    $q = mysqli_query($conn, "
    SELECT COUNT(*) as total FROM booking 
    WHERE kamar_id = {$k['id']}
    AND status != 'cancelled'
    AND (checkin <= '$today' AND checkout > '$today')
    ");

    $data = mysqli_fetch_assoc($q);
    $sisa = $k['jumlah_unit'] - $data['total'];
    ?>

    <div class="col-md-4 d-flex">
        <div class="card shadow w-100 d-flex flex-column">
            <div class="position-relative">
                <img src="<?= $k['gambar']; ?>" class="card-img-top">
                <span class="badge bg-primary position-absolute top-0 end-0 m-2">
                    <?= $k['badge']; ?>
                </span>
            </div>

            <div class="card-body text-center">
                <h5 class="fw-bold"><?= $k['nama']; ?></h5>
                <p class="text-muted"><?= $k['deskripsi']; ?></p>
                <p class="fw-bold text-primary fs-5">Rp <?= $k['harga']; ?></p>
                <p class="small"><?= $k['fitur']; ?></p>
                <a href="booking.php?id=<?= $k['id']; ?>" class="btn btn-outline-primary w-100 mt-3">
                    Pesan
                </a>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
    </div>
</div>

<!-- TESTIMONI -->
<div class="container testimoni text-center my-5">
    <h2 class="mb-4">Testimoni Pengunjung</h2>
    <div class="row g-4">

        <div class="col-md-4 d-flex">
            <div class="card p-4 shadow w-100 d-flex flex-column justify-content-between">
                <p>"Pelayanan sangat ramah dan kamar bersih!"</p>
                <h6 class="mt-3">- Andi</h6>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card p-4 shadow w-100 d-flex flex-column justify-content-between">
                <p>"Lokasi strategis dekat tempat wisata."</p>
                <h6 class="mt-3">- Siti</h6>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card p-4 shadow w-100 d-flex flex-column justify-content-between">
                <p>"Harga sesuai dengan fasilitas yang diberikan."</p>
                <h6 class="mt-3">- Budi</h6>
            </div>
        </div>

    </div>
</div>

</main>

<!-- FOOTER -->
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

            <div class="col-md-4 mb-4" id="location">
                <h5 class="fw-bold">Contact</h5>
                <p>📍 Yogyakarta, Indonesia</p>
                <p>📞 0812-3456-7890</p>
                <p>✉️ ombakbiru@email.com</p>

                <div class="social-icons mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="login_admin.php" class="icon-user">
                        <i class="bi bi-person-fill"></i>
                    </a>
                </div>
            </div>

        </div>

        <hr class="bg-light">
        <p class="text-center small mb-0">
            &copy; 2026 Ombak Biru Hotel | All Rights Reserved
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_SESSION['success'])) { ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Booking Berhasil!',
    text: 'Kamar berhasil dipesan 🎉',
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php unset($_SESSION['success']); } ?>

<!-- 🔥 SCRIPT KAMU TARUH DI SINI -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>