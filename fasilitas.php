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
            $query = mysqli_query($conn, "SELECT * FROM facilities");

            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                
                <div class="col-md-4">
                    <div class="card facility-card h-100 shadow-sm">
                        <img src="img/<?php echo $row['image']; ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi <?php echo $row['icon']; ?> fs-1 text-primary"></i>
                            <h5 class="mt-3"><?php echo $row['name']; ?></h5>
                            <p class="text-muted"><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
</body>
</html>