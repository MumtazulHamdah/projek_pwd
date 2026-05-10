<!DOCTYPE html>
<html lang="en">
<head>
<head>
<meta charset="UTF-8">
<title>Pembayaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: url('img/hotel.jpg') no-repeat center center/cover;
    height: 100vh;
    margin: 0;
}

.overlay {
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.6);
}

.payment-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    width: 420px;
    z-index: 2;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.title {
    font-weight: 600;
    color: #0f2a44;
}

.btn-primary {
    background-color: #0f2a44;
    border: none;
}
</style>
</head>
<body>
<div class="overlay d-flex justify-content-center align-items-center">
    <div class="payment-card">
        <h3 class="text-center title mb-3">Pembayaran</h3>
        <p class="text-center text-muted mb-4">Silakan lakukan pembayaran</p>
        <div class="mb-4">
            <p><b>Transfer ke:</b></p>
            <p>BCA - 123456789 a.n Ombak Biru Hotel</p>
            <p>DANA - 08123456789</p>
        </div>
        <form action="proses_bayar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="booking_id" value="<?= $id ?>">
            <input type="hidden" name="tipe" value="<?= $_GET['tipe'] ?>">
            <div class="mb-3">
                <label class="form-label">Metode Pembayaran</label>
                <select name="metode" id="metode" class="form-control" required onchange="toggleUpload()">
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Bayar di Tempat">Bayar di Tempat</option>
                </select>
            </div>
            <div class="mb-3" id="uploadBukti">
                <label class="form-label">Upload Bukti Transfer</label>
                <input type="file" name="bukti" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Bayar Sekarang
            </button>
        </form>
    </div>
</div>

<!-- java -->
>>>>>>> 7bed936 (up)
<script>
function toggleUpload() {
    let metode = document.getElementById("metode").value;
    let upload = document.getElementById("uploadBukti");
    if (metode === "Bayar di Tempat") {
        upload.style.display = "none";
    } else {
        upload.style.display = "block";
    }
}
</script>
</body>
</html>