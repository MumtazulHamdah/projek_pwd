<?php
session_start();
include 'koneksi.php';

$id_user = $_SESSION['id_user'];

$query = mysqli_query($conn, "
SELECT booking.*, kamar.nama_kamar 
FROM booking 
JOIN kamar ON booking.id_kamar = kamar.id_kamar
WHERE booking.id_user = '$id_user'
");
?>

<h2>Riwayat Booking</h2>

<?php while($row = mysqli_fetch_assoc($query)) { ?>
    <div>
        <h3><?= $row['nama_kamar'] ?></h3>
        <p><?= $row['checkin'] ?> - <?= $row['checkout'] ?></p>
        <p>Status: <?= $row['status'] ?></p>
    </div>
<?php } ?>