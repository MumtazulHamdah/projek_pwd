<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("LOCATION: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <a href="logout.php">Logout</a>
</body>
</html>

