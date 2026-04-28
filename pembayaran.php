<?php
include 'koneksi.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f8f9fa;">

<div class="container py-5">
    <div class="card shadow p-4">

        <h3 class="mb-3 text-center">Pembayaran</h3>

        <div class="mb-4">
            <p><b>Transfer ke:</b></p>
            <p>BCA - 123456789 a.n Ombak Biru Hotel</p>
            <p>DANA - 08123456789</p>
        </div>

        <form action="proses_bayar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="booking_id" value="<?= $id ?>">

            <div class="mb-3">
                <label class="form-label">Metode Pembayaran</label>
                <select name="metode" id="metode" class="form-control" required onchange="toggleUpload()">
                    <option value="">-- Pilih --</option>
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
                Bayar
            </button>
        </form>

    </div>
</div>

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