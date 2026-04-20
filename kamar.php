<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM kamar");
?>

<h2>Daftar Kamar</h2>

<?php while($row = mysqli_fetch_assoc($query)) { ?>
    <div>
        <h3><?= $row['nama_kamar'] ?></h3>
        <p>Harga: <?= $row['harga'] ?></p>
        <a href="booking.php?id=<?= $row['id_kamar'] ?>">Booking</a>
    </div>
<?php } ?>