<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - Ombak Biru Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

 <style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f8f9fa;
}

.hero-facilities {
    background: url('img/hotel.jpg') center/cover no-repeat;
    height: 300px;
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

.facility-card {
    transition: 0.3s;
    border: none;
    border-radius: 12px;
}

.facility-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
</style>

</head>
<body>
    <div class="hero-facilities">
        <div class="hero-overlay">
            <div>
                <h1>Our Facilities</h1>
                <p>Nikmati fasilitas terbaru dari Ombak Biru Hotel</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2>Fasilitas Hotel</h2>
            <p class="text-muted">Kami menyediakan fasilitas lengkap untuk kenyamanan Anda</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card facility-card p-3 text-center h-100">
                    <h4>Restaurant</h4>
                    <p>Restoran dengan menu lokal & internasional.</p>
                </div>
            </div>

            <div class="row g-4">
            <div class="col-md-4">
                <div class="card facility-card p-3 text-center h-100">
                    <h4>Hall</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="row g-4">
            <div class="col-md-4">
                <div class="card facility-card p-3 text-center h-100">
                    <h4>Swimming Pool</h4>
                    <p>Kolam renang dengan view laut yang indah.</p>
                </div>
            </div>

            <div class="row g-4">
            <div class="col-md-4">
                <div class="card facility-card p-3 text-center h-100">
                    <h4>Gym Center</h4>
                    <p>Fasilitas lengkap olahraga untuk tamu.</p>
                </div>
            </div>

            <div class="row g-4">
            <div class="col-md-4">
                <div class="card facility-card p-3 text-center h-100">
                    <h4>Spa & Massage</h4>
                    <p>Relaksasi tubuh dengan layanan profesional.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>