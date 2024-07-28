<?php
require_once 'Model/Penjualan.php'; // Ensure the path is correct

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$penjualan = new Penjualan($pdo);
$profitLoss = $penjualan->getProfitLoss();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome to the Index Page</h1>
    <ul>
        <li><a href="View/ListBarang.php">List Barang</a></li>
        <li><a href="View/ListHakAkses.php">List Hak Akses</a></li>
        <li><a href="View/ListPembelian.php">List Pembelian</a></li>
        <li><a href="View/ListPengguna.php">List Pengguna</a></li>
        <li><a href="View/ListPenjualan.php">List Penjualan</a></li>
    </ul>

    <h2>Profit/Loss</h2>
    <p>
        <?php
        if ($profitLoss !== null) {
            echo "The current profit/loss is: " . number_format($profitLoss, 2);
        } else {
            echo "No sales data available.";
        }
        ?>
    </p>
    
</body>
</html>