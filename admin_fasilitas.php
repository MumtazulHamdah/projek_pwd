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
    $icon = $_POST['icon'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "img/".$gambar);

    mysqli_query($conn, "
    INSERT INTO fasilitas
    (nama, harga, icon, deskripsi, gambar)
    VALUES
    ('$nama','$harga','$icon','$deskripsi','$gambar')
    ");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM fasilitas WHERE id=$id");
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $icon = $_POST['icon'];
    $deskripsi = $_POST['deskripsi'];
    if($_FILES['gambar']['name']){
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "img/".$gambar);
        mysqli_query($conn, "
        UPDATE fasilitas SET
        nama='$nama',
        harga='$harga',
        icon='$icon',
        deskripsi='$deskripsi',
        gambar='$gambar'
        WHERE id=$id
        ");

    } else {

        mysqli_query($conn, "
        UPDATE fasilitas SET
        nama='$nama',
        harga='$harga',
        icon='$icon',
        deskripsi='$deskripsi'
        WHERE id=$id
        ");
    }
}

$query = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kelola Fasilitas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>

<div class="navbar-custom">
    <div class="navbar-title">
        Admin Ombak Biru
    </div>
</div>
<div class="hero">
    <div class="overlay">
        <h2>Kelola Fasilitas</h2>
    </div>
</div>
<div class="container content mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Fasilitas</h2>

    <div>

        <a href="admin.php" class="btn btn-secondary">
            Kembali
        </a>

        <button class="btn btn-warning text-white"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah">
            Tambah Fasilitas
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
    <th>Icon</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php while($f = mysqli_fetch_assoc($query)) : ?>

<tr>

<td>
    <img src="img/<?= $f['gambar']; ?>" width="100">
</td>

<td><?= $f['nama']; ?></td>

<td>
    Rp <?= number_format($f['harga']); ?>
</td>

<td>
    <i class="bi <?= $f['icon']; ?>"></i>
    <?= $f['icon']; ?>
</td>

<td>

<button class="btn btn-warning btn-sm"
data-bs-toggle="modal"
data-bs-target="#edit<?= $f['id']; ?>">
Edit
</button>

<a href="?hapus=<?= $f['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus fasilitas?')">
Hapus
</a>

</td>

</tr>

<div class="modal fade" id="edit<?= $f['id']; ?>">

<div class="modal-dialog modal-lg">

<div class="modal-content">

<form method="POST" enctype="multipart/form-data">

<div class="modal-header">
    <h5>Edit Fasilitas</h5>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?= $f['id']; ?>">

<div class="row">

<div class="col-md-6 mb-3">
<label>Nama</label>
<input type="text"
name="nama"
class="form-control"
value="<?= $f['nama']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Harga</label>
<input type="number"
name="harga"
class="form-control"
value="<?= $f['harga']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Icon Bootstrap</label>
<input type="text"
name="icon"
class="form-control"
value="<?= $f['icon']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Gambar Baru</label>
<input type="file" name="gambar" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi"
class="form-control"><?= $f['deskripsi']; ?></textarea>
</div>

<div class="col-md-6 mb-3 text-center">
<label>Preview</label><br>
<img src="img/<?= $f['gambar']; ?>" width="120">
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
    <h5>Tambah Fasilitas</h5>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-6 mb-3">
<label>Nama Fasilitas</label>
<input type="text"
name="nama"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Harga</label>
<input type="number"
name="harga"
class="form-control"
required>
</div>

<div class="col-md-6 mb-3">
<label>Icon Bootstrap</label>
<input type="text"
name="icon"
class="form-control"
placeholder="contoh: bi-cup-hot"
required>
</div>

<div class="col-md-6 mb-3">
<label>Gambar</label>
<input type="file"
name="gambar"
class="form-control"
required>
</div>

<div class="col-12 mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi"
class="form-control"></textarea>
</div>

</div>
</div>
<div class="modal-footer">

<button type="submit"
name="tambah"
class="btn btn-warning text-white">
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