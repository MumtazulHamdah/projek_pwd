<?php
session_start();

// kalo udah login redirect ke dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotel Pariwisata</title>

    <!-- Bootstrap --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="container login-container d-flex justify-content-center align-items-center">
        <div class="card shadow p-4">
            <h3 class="text-center mb-3">Login User</h3>

            <!-- pesan eror -->
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger text-center">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>

            <form method="post" action="proses_login.php">
                <!-- token csrf -->
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" minlength="5" required>
                </div>

                <div class="mb-3">
                    <input type="checkbox" onclick="togglePassword()"> Lihat Password
                </div>

                <button type="submit" class="btn btn-custom w-100">Login</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var x = document.querySelector('input[name="password"]');
            x.type = x.type === "password" ? "text" : "password";
        }
    </script>

</body>
</html>