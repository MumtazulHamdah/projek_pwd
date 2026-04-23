<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Breeze Hotel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Navbar */
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

        /* Hero */
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

        .hero h2 {
            font-size: 45px;
        }

        .btn-custom {
            background-color: #f39c12;
            color: white;
        }

        .btn-custom:hover {
            background-color: #e67e22;
        }

        .fitur {
            padding: 60px 0;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }
    </style>
</head>
<body>
<header>
    <h1>Ocean Breeze Hotel</h1>
    <nav>
        <a href="dashboard.php">Home</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<section class="hero">
    <div>
        <h2>Selamat Datang</h2>
        <p>Website reservasi hotel terbaik untuk liburan kamu</p>
        <a href="login.php" class="btn btn-custom mt-3">Pesan Sekarang</a>
    </div>
</section>

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

<footer style="center">
    <p>&copy; 2026 Hotel Pariwisata | All Rights Reserved</p>
</footer>

</body>
</html>