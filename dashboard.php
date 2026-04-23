<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Breeze Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        header {
            background-color: #2c3e50;
            padding: 15px 0;
            text-align: center;
        }

        header h1 {
            color: white;
            margin-bottom: 5px;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        nav a:hover {
            color: #f39c12;
        }

        .hero {
            height: 80vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('https://source.unsplash.com/1600x900/?hotel,resort') no-repeat center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .btn-custom {
            background-color: #f39c12;
            color: white;
        }

        .btn-custom:hover {
            background-color: #e67e22;
        }

        .fitur, .kamar, .testimoni {
            padding: 60px 0;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>Ocean Breeze Hotel</h1>
    <nav>
        <a href="index.php" class="btn btn-light mt-2">Home</a>
        <a href="login.php" class="btn btn-light mt-2">Login</a>
    </nav>
</header>

<div class="container fitur text-center">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Kamar Nyaman</h4>
                <p>Kamar bersih dan nyaman untuk istirahat.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Harga Terjangkau</h4>
                <p>Harga terbaik untuk semua kalangan.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Lokasi Strategis</h4>
                <p>Dekat dengan tempat wisata populer.</p>
            </div>
        </div>
    </div>
</div>

<div class="container kamar text-center">
    <h2 class="mb-4">Pilihan Kamar</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <img src="img/standard room.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Standard Room</h5>
                    <p>Nyaman untuk 2 orang.</p>
                </div>
                <a href="detail.php" class="btn btn-custom mt-3">Pesan</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <img src="img/deluxe room.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Deluxe Room</h5>
                    <p>Lebih luas dan mewah.</p>
                </div>
                <a href=""></a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <img src="img/suite room.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Suite Room</h5>
                    <p>Fasilitas premium terbaik.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container testimoni text-center">
    <h2 class="mb-4">Testimoni Pengunjung</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 shadow">
                <p>"Pelayanan sangat ramah dan kamar bersih!"</p>
                <h6>- Andi</h6>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <p>"Lokasi strategis dekat tempat wisata."</p>
                <h6>- Siti</h6>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <p>"Harga sesuai dengan fasilitas yang diberikan."</p>
                <h6>- Budi</h6>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer>
    <p>&copy; 2026 Hotel Pariwisata | All Rights Reserved</p>
</footer>

</body>
</html>