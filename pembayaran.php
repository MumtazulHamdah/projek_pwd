<?php
include 'koneksi.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
</head>
<body>

<h2>Pembayaran</h2>

<p><b>Transfer ke:</b></p>
<p>BCA - 123456789 a.n Ombak Biru Hotel</p>
<p>DANA - 08123456789</p>

<form action="proses_bayar.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="booking_id" value="<?= $id ?>">

    <label>Metode:</label><br>
    <select name="metode" required>
        <option value="">-- Pilih --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="E-Wallet">E-Wallet</option>
        <option value="Bayar di Tempat">Bayar di Tempat</option>
    </select>

    <br><br>

    <label>Upload Bukti:</label><br>
    <input type="file" name="bukti">

    <br><br>
    <button type="submit">Bayar</button>
</form>

</body>
</html>