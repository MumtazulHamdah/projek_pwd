<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "nama_database";

$conn = new mysqli($host, $user, $pass, $db = "projek_pwd");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter 'room' dengan aman
$room = isset($_GET['room']) ? intval($_GET['room']) : 0;
if ($room <= 0) {
    echo "ID room tidak valid.";
    exit;
}

// Prepared statement
$stmt = $conn->prepare("SELECT * FROM rooms WHERE id = ?");
$stmt->bind_param("i", $room);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Room tidak ditemukan.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Room</title>
    <link rel="stylesheet" href="css/detail.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Detail Room</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($data['nama']); ?></h5>
            <p class="card-text"><strong>ID:</strong> <?php echo htmlspecialchars($data['id']); ?></p>
            <p class="card-text"><strong>Deskripsi:</strong> <?php echo htmlspecialchars($data['deskripsi']); ?></p>
            <p class="card-text"><strong>Harga:</strong> <?php echo htmlspecialchars($data['harga']); ?></p>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>