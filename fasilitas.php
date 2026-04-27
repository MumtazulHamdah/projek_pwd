<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - Ombak Biru Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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

.icon-facility {
    font-size: 30px;
    color: #c8a96a;
}

.fitur-card {
    border-radius: 20px;
    padding: 30px;
    background: white;
    transition: 0.3s;
    border: none;    
}

.fitur-card:hover {
    transform: translateY(-8px);
    box-shadow: rgba(0,0,0,0.1);
}

.fitur-card i {
    font-size: 35px;
    color: #c8a96a;
    margin-bottom: 15px;
}

.luxury-card {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
}

.luxury-card img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    transition: 0.5s;
}

.luxury-card .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.85));
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 25px;
}

.luxury-card:hover {
    transform: scale(1.1);
}

.luxury-card h3 {
    font-weight: bold;
}

.luxury-card span {
    color: #d4af37;
    font-weight: bold;
}

.container {
    margin-top: 80px;
}

.img-wrapper {
    overflow: hidden;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.img-wrapper img {
    height: 200px;
    width: 100%;
    object-fit: cover;
    transition: 0.4s;
}

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
    color: #d4af37; /* gold */
    margin-bottom: 5px;
}

.overlay-card:hover img {
    transform: scale(1.1);
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
            
            <?php
            $query = mysqli_query($conn, "SELECT * FROM fasilitas   ");

            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <div class="col-md-4">
                    <div class="facility-card overlay-card">
                        <img src="img/<?php echo $row['image']; ?>">
                        <div class="overlay">
                            <i class="bi <?php echo $row['icon']; ?>"></i>
                            <h5><?php echo $row['name']; ?></h5>
                            <p><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <!-- BALLROOM SECTION -->
                <div class="container my-5">
                    <h2 class="text-center mb-4">Ballroom & Events</h2>
                    <p class="text-center text-muted mb-5">Nikmati fasilitas eksklusif dan ruang event mewah untuk setiap momen spesial Anda</p>
                </div>

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
</body>
</html>