<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM kamar");

$kamar = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ombak Biru Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
//aku tadi benerin navbar doang, yang atur layot kamar belum
<header class="navbar-custom">
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>

    <div class="menu">
        <a href="#">Home</a>
        <a href="#">Rooms</a>
        <a href="#">Facilities</a>
        <a href="#">Ballroom</a>
        <a href="#">Location</a>
        <a href="#">Contact Us</a>
    </div>
    <a href="#" class="btn-book">BOOK NOW</a>
</header>

<main>
<div class="hero-section position-relative">
    <img src="img/hotel.jpg" alt="Hotel Lobby" class="w-100" style="height: 90vh; object-fit: cover;">
    <div class="overlay d-flex flex-column justify-content-center align-items-center text-white">
        <h1>Welcome to Ombak Biru Hotel</h1>
        <p>Nikmati kenyamanan dengan pemandangan laut</p>
        <a href="#" class="btn btn-light mt-3">Explore</a>
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
<div class="container fitur text-center my-5">
    <div class="row g-4">

        <div class="col-md-4 d-flex">
            <div class="card p-4 shadow w-100 d-flex flex-column justify-content-center fitur-card">
                <h4>Kamar Nyaman</h4>
                <p>Kamar bersih dan nyaman untuk istirahat.</p>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card p-4 shadow w-100 d-flex flex-column justify-content-center fitur-card">
                <h4>Harga Terjangkau</h4>
                <p>Harga terbaik untuk semua kalangan.</p>
            </div>
        </div>

        <div class="col-md-4 d-flex">
            <div class="card p-4 shadow w-100 d-flex flex-column justify-content-center fitur-card">
                <h4>Lokasi Strategis</h4>
                <p>Dekat dengan tempat wisata populer.</p>
            </div>  
        </div>

    </div>
</div>

<div class="container kamar text-center my-5">
    <h2 class=" text-center mb-5 fw-bold">Pilihan Kamar</h2>
    <div class="row g-4">

    <?php foreach($kamar as $k) : ?>
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
                    <p class="fw-bold text-primary fs-5"><?= $k['harga']; ?></p>
                    <p class="small"><?= $k['fitur']; ?></p>
                    <a href="booking.php?id=<?= $k['id']; ?>" class="btn btn-outline-primary w-100 mt-3">Pesan</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    <?php
$kamar = [
    [
        "nama" => "Standard Room",
        "deskripsi" => "Nyaman untuk 2 orang",
        "harga" => "Rp 350.000 / malam",
        "fitur" => "👤 2 Tamu • 📶 WiFi • ❄️ AC • 📺 TV",
        "gambar" => "img/standard room.jpg",
        "badge" => "Best Value"
    ],
    [
        "nama" => "Deluxe Room",
        "deskripsi" => "Lebih luas & elegan",
        "harga" => "Rp 650.000 / malam",
        "fitur" => "👤 3 Tamu • 📶 WiFi • ❄️ AC • ☕ Breakfast",
        "gambar" => "img/deluxe room.jpg",
        "badge" => "Populer"
    ],
    [
        "nama" => "Suite Room",
        "deskripsi" => "Fasilitas terbaik & mewah",
        "harga" => "Rp 1.200.000 / malam",
        "fitur" => "👤 4 Tamu • 🛁 Bathtub • 🌊 View Laut",
        "gambar" => "img/suite room.jpg",
        "badge" => "Premium"
    ]
];
?>
            </div>
        </div>


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
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Contact</h5>
                <p>📍 Yogyakarta, Indonesia</p>
                <p>📞 0812-3456-7890</p>
                <p>✉️ ombakbiru@email.com</p>

                <!-- SOCIAL MEDIA -->
                <div class="social-icons mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
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