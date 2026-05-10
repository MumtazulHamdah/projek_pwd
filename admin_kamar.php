<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah_unit'];
    $badge = $_POST['badge'];
    $deskripsi = $_POST['deskripsi'];
    $fitur = $_POST['fitur'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "img/" . $gambar;
    move_uploaded_file($tmp, $path);
    mysqli_query($conn, "
    INSERT INTO kamar
    (nama, harga, jumlah_unit, badge, deskripsi, fitur, gambar)
    VALUES
    ('$nama','$harga','$jumlah','$badge','$deskripsi','$fitur','$path')
    ");
}
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM kamar WHERE id=$id");
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah_unit'];
    $badge = $_POST['badge'];
    $deskripsi = $_POST['deskripsi'];
    $fitur = $_POST['fitur'];
    if($_FILES['gambar']['name']){
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $path = "img/" . $gambar;
        move_uploaded_file($tmp, $path);
        mysqli_query($conn, "
        UPDATE kamar SET
        nama='$nama',
        harga='$harga',
        jumlah_unit='$jumlah',
        badge='$badge',
        deskripsi='$deskripsi',
        fitur='$fitur',
        gambar='$path'
        WHERE id=$id
        ");
    } else {
        mysqli_query($conn, "
        UPDATE kamar SET
        nama='$nama',
        harga='$harga',
        jumlah_unit='$jumlah',
        badge='$badge',
        deskripsi='$deskripsi',
        fitur='$fitur'
        WHERE id=$id
        ");
    }
}
$query = mysqli_query($conn, "SELECT * FROM kamar ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kelola Kamar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="navbar-custom">
    <div class="navbar-title">Admin Ombak Biru</div>
    <div class="navbar-right">
    </div>
</div>
<div class="hero">
    <div class="overlay">
        <h2>Kelola Kamar</h2>
    </div>
</div>
<div class="container content mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Kamar</h2>
    <div>
        <a href="admin.php" class="btn btn-secondary">
            Kembali
        </a>
        <button class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah">
            Tambah Kamar
        </button>
    </div>
</div>
<div class="card shadow">
<div class="card-body">
<table class="table table-bordered text-center align-middle">
<thead>
<tr>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Unit</th>
    <th>Badge</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php while($k = mysqli_fetch_assoc($query)) : ?>
<tr>
<td>
    <img src="<?= $k['gambar']; ?>" width="100">
</td>
<td><?= $k['nama']; ?></td>
<td>
    Rp <?= number_format($k['harga']); ?>
</td>
<td><?= $k['jumlah_unit']; ?></td>
<td><?= $k['badge']; ?></td>
<td>
<button 
class="btn btn-warning btn-sm"
data-bs-toggle="modal"
data-bs-target="#edit<?= $k['id']; ?>">
Edit
</button>
<a href="?hapus=<?= $k['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus kamar?')">
Hapus
</a>
</td>
</tr>

<div class="modal fade" id="edit<?= $k['id']; ?>">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form method="POST" enctype="multipart/form-data">
<div class="modal-header">
    <h5>Edit Kamar</h5>
</div>
<div class="modal-body">
<div class="modal-body">
<input type="hidden" name="id" value="<?= $k['id']; ?>">

<div class="row">

<div class="col-md-6 mb-3">
<label>Nama</label>
<input type="text" 
name="nama"
class="form-control"
value="<?= $k['nama']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Harga</label>
<input type="number"
name="harga"
class="form-control"
value="<?= $k['harga']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Jumlah Unit</label>
<input type="number"
name="jumlah_unit"
class="form-control"
value="<?= $k['jumlah_unit']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Badge</label>
<input type="text"
name="badge"
class="form-control"
value="<?= $k['badge']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi"
class="form-control"><?= $k['deskripsi']; ?></textarea>
</div>

<div class="col-md-6 mb-3">
<label>Fitur</label>
<textarea name="fitur"
class="form-control"><?= $k['fitur']; ?></textarea>
</div>

<div class="col-md-6 mb-3">
<label>Gambar Baru</label>
<input type="file" name="gambar" class="form-control">
</div>

<div class="col-md-6 mb-3 text-center">
<label>Preview</label><br>
<img src="<?= $k['gambar']; ?>" width="120">
</div>

</div>
</div>
<div class="modal-footer">
<button type="submit"
name="update"
class="btn btn-primary">
Update
</button>

<button type="button"
class="btn btn-secondary"
data-bs-dismiss="modal">
Close
</button>

</div>

</form>
</div>
</div>
</div>
<?php endwhile; ?>
</tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="modalTambah">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form method="POST" enctype="multipart/form-data">
<div class="modal-header">
    <h5>Tambah Kamar</h5>
</div>
<div class="modal-body">
<div class="modal-body">
<div class="row">

<div class="col-md-6 mb-3">
<label>Nama Kamar</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Jumlah Unit</label>
<input type="number" name="jumlah_unit" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Badge</label>
<input type="text" name="badge" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<div class="col-md-6 mb-3">
<label>Fitur</label>
<textarea name="fitur" class="form-control"></textarea>
</div>

<div class="col-12 mb-3">
<label>Gambar</label>
<input type="file" name="gambar" class="form-control" required>
</div>
</div>
</div>
<div class="modal-footer">

<button type="submit" 
name="tambah" 
class="btn btn-primary">
Tambah
</button>

<button type="button"
class="btn btn-secondary"
data-bs-dismiss="modal">
Close
</button>

</div>
</form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>