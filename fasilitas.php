<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - Ombak Biru Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f8f9fa;
    padding-top: 80px;
}

/* ================= NAVBAR ================= */
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
    height: 54px;
    transition: 0.3s;
}
.logo a:hover img {
    transform: scale(1.08);
    filter: brightness(1.1);
}

/* efek klik */
.logo a:active img {
    transform: scale(0.95);
}  

/* MENU TENGAH */
.menu {
    display: flex;
    gap: 30px;
    margin: 0 auto;
}

.menu a {
    text-decoration: none;
    color: #333;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: 0.3s;
}

.menu a:hover {
    color: #c8a96a;
}

/* ACTIVE KUNING */
.menu a.active {
    color: #c8a96a;
    font-weight: 700;
}

.btn-book {
    background: #0f2a44 !important;
    color: white;
    padding: 10px 28px;
    font-size: 13px;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(15, 42, 68, 0.3);
    margin-right: 5px;
    

    clip-path: polygon(
        15% 0%, 
        85% 0%, 
        100% 50%, 
        85% 100%, 
        15% 100%, 
        0% 50%
    );

    display: inline-block;
    transition: 0.3s;
}
.btn-book:hover {
    background: #003049 !important;
    transform: scale(1.05);
}
/* ================= HERO ================= */
.hero-facilities {
    background: url('img/hotel.jpg') center/cover no-repeat;
    height: 100vh; /* FULL layar */
    position: relative;
    color: white;
}

.hero-overlay {
    background: rgba(0,0,0,0.5);
    height: 100%;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.hero-overlay h1 {
    font-size: 2.5rem;
    font-weight: bold;
}

/* ================= CARD ================= */
.facility-card {
    transition: 0.3s;
    border: none;
    border-radius: 12px;
}

.facility-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* OVERLAY CARD */
.overlay-card {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
}

.overlay-card img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: 0.5s;
}

.overlay-card .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.85));
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 20px;
}

.overlay-card h5 {
    font-size: 20px;
    font-weight: 600;
}

.overlay-card p {
    font-size: 14px;
    opacity: 0.8;
}

.overlay-card i {
    font-size: 25px;
    color: #d4af37;
    margin-bottom: 5px;
}

.overlay-card:hover img {
    transform: scale(1.1);
}

/* LUXURY */
.facility-card.luxury {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
}

.facility-card.luxury img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: 0.5s;
}

.facility-card.luxury .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.85));
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 20px;
}

.facility-card.luxury span {
    font-weight: bold;
    color: #c8a96a;
}

.facility-card.luxury:hover img {
    transform: scale(1.1);
}
/* ================= FOOTER ================= */
.footer-custom {
    background-color: #0F2A44;
}

.footer-custom h4,
.footer-custom h5 {
    color: #C8A96A;
}

.footer-custom a {
    color: #ddd;
    text-decoration: none;
}

.footer-custom a:hover {
    color: #C8A96A;
}
.social-icons a {
    color: white;
    margin-right: 10px;
    font-size: 18px;
    gap: 5px; 
}

.social-icons a:hover {
    color: #C8A96A;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header class="navbar-custom">
    <div class="logo">
    <a href="dashboard.php">
        <img src="img/logo.png">
    </div>

    <div class="menu">
        <a href="dashboard.php">Home</a>
        <a href="dashboard.php#rooms">Rooms</a>
        <a href="fasilitas.php" class="active">Facilities</a>
        <a href="fasilitas.php#location">Location</a>
        <a href="fasilitas.php#location">Contact Us</a>
    </div>
    <a href="#fasilitas" class="btn-book">BOOK NOW</a>
    
</header>

<!-- HERO -->
<div class="hero-facilities">
    <div class="hero-overlay">
        <div>
            <h1>Our Facilities</h1>
            <p>Nikmati fasilitas terbaik dari Ombak Biru Hotel</p>
        </div>
    </div>
</div>

<!-- CONTENT -->
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
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- BALLROOM -->
<div class="container my-5">
    <h2 class="text-center mb-4">Ballroom & Events</h2>
    <p class="text-center text-muted mb-5">Nikmati ruang event mewah untuk momen spesial</p>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="facility-card luxury">
                <img src="img/ballroom1.jpg">
                <div class="overlay"> 
                    <h4>Grand Ballroom</h4>
                    <p>Kapasitas hingga 500 tamu</p>
                    <span>Rp 15.000.000 / event</span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="facility-card luxury">
                <img src="img/ballroom2.jpg">
                <div class="overlay">
                    <h4>Mini Ballroom</h4>
                    <p>Kapasitas hingga 150 tamu</p>
                    <span>Rp 5.000.000 / event</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<footer class="footer-custom text-white pt-5 pb-3">
    <div class="container">
        <div class="row">

            <!-- BRAND -->
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold">Ombak Biru Hotel</h4>
                <p>Nikmati kenyamanan menginap dengan pemandangan laut yang indah dan suasana tenang.</p>
            </div>

            <!-- MENU -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">Facilities</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-4 mb-4" id="location" >
                <h5 class="fw-bold">Contact</h5>
                <p>📍 Yogyakarta, Indonesia</p>
                <p>📞 0812-3456-7890</p>
                <p>✉️ ombakbiru@email.com</p>

                <!-- SOCIAL MEDIA -->
                <div class="social-icons mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="login.php" class="icon-user"><i class="bi bi-person-fill"></i></a>

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