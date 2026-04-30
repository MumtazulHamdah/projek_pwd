<?php
include 'koneksi.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
        }

        .header {
            background: white;
            padding: 20px 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: 600;
            font-size: 20px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            display: flex;
            gap: 20px;
        }

        .left {
            flex: 2;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .right {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 12px;
            height: fit-content;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        h2 {
            margin-top: 0;
            font-weight: 600;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        select, input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .payment-box {
            background: #fafafa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .payment-box p {
            margin: 5px 0;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #c8a96a; /* warna gold */
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #b89655;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total {
            font-weight: 600;
            font-size: 18px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

    </style>
</head>
<body>

<div class="header">
    <div class="logo">Ombak Biru Hotel</div>
    <div>Secure Payment</div>
</div>

<div class="container">

    <!-- LEFT FORM -->
    <div class="left">
        <h2>Pembayaran</h2>

        <div class="payment-box">
            <p><b>Transfer ke:</b></p>
            <p>BCA - 123456789</p>
            <p>DANA - 08123456789</p>
        </div>

        <form action="proses_bayar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="booking_id" value="<?= $id ?>">

            <label>Metode Pembayaran</label>
            <select name="metode" id="metode" required>
                <option value="">Pilih metode</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="E-Wallet">E-Wallet</option>
                <option value="Bayar di Tempat">Bayar di Tempat</option>
            </select>

            <br><br>

            <label>
                Upload Bukti Pembayaran
                <span id="wajib" style="color:red; display: none;">*</span>
            </label>
            <input type="file" name="bukti" id="bukti">

            <br><br>

            <button type="submit">Konfirmasi Pembayaran</button>
        </form>
    </div>

    <!-- RIGHT SUMMARY -->
    <div class="right">
        <h3>Ringkasan Booking</h3>

        <div class="summary-item">
            <span>Kamar</span>
            <span>Deluxe Room</span>
        </div>

        <div class="summary-item">
            <span>Malam</span>
            <span>2</span>
        </div>

        <div class="summary-item">
            <span>Harga</span>
            <span>Rp 800.000</span>
        </div>

        <div class="summary-item total">
            <span>Total</span>
            <span>Rp 1.600.000</span>
        </div>
    </div>

</div>
</body>
</html>