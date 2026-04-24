<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballroom - Ombak Biru Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background: #f8f9fa;
    }

    .hero-ballroom {
    background: url('img/hotel.jpg') center/cover no-repeat;
    height: 320px;
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

    .ballroom-card {
    border: none;
    border-radius: 15px;
    transition: 0.3s;
    }

   .ballroom-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .price {
    color: #c8a96a;
    font-weight: bold;
    font-size: 20px;
    }
    </style>

</head>
<body>
    <div class="hero-ballroom">
    <div class="hero-overlay">
        <div>
            <h1>Ballroom Event</h1>
            <p>Ruangan mewah untuk wedding, meeting, dan event besar</p>
        </div>
    </div>

    <div class="container my-5">

    <div class="text-center mb-5">
        <h2>Ballroom Kami</h2>
        <p class="text-muted">Pilihan ruang terbaik untuk acara spesial Anda</p>
    </div>

    <div class="row g-4">
    <div class="col-md-6">
            <div class="card ballroom-card p-4 h-100 text-center">

                <h3>Grand Ballroom</h3>
                <p>Kapasitas hingga 500 tamu, cocok untuk wedding & event besar.</p>

                <ul class="list-unstyled">
                    <li>✔ AC Full Room</li>
                    <li>✔ Sound System</li>
                    <li>✔ Stage & Lighting</li>
                    <li>✔ Decoration Support</li>
                </ul>

                <p class="price">Rp 15.000.000 / event</p>

                <a href="#" class="btn btn-primary">Book Now</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card ballroom-card p-4 h-100 text-center">

                <h3>Mini Ballroom</h3>
                <p>Kapasitas hingga 150 tamu, cocok untuk meeting & seminar.</p>

                <ul class="list-unstyled">
                    <li>✔ AC Full Room</li>
                    <li>✔ Projector</li>
                    <li>✔ Sound System</li>
                    <li>✔ WiFi High Speed</li>
                </ul>

                <p class="price">Rp 5.000.000 / event</p>

                <a href="#" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>