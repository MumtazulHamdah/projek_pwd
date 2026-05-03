<?php
include 'config.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fasilitas WHERE id=$id"));
?>

<h2>Booking: <?= $data['name'] ?></h2>

<form action="proses_booking_fasilitas.php" method="POST">
    <input type="hidden" name="fasilitas_id" value="<?= $id ?>">

    <label>Nama</label>
    <input type="text" name="nama" required><br><br>

    <label>Tanggal</label>
    <input type="date" name="tanggal" required><br><br>

    <label>Jumlah Orang</label>
    <input type="number" name="jumlah" required><br><br>

    <button type="submit">Booking Sekarang</button>
</form>