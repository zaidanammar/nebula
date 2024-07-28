<?php
require_once '../Model/Penjualan.php';

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

// Check if ID is provided
if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = intval($_GET['id']);
$penjualan = new Penjualan($pdo);

// Fetch the item to edit
$item = $penjualan->readItem($id);
if (!$item) {
    die("Item not found.");
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlahPenjualan = $_POST['jumlahPenjualan'];
    $hargaJual = $_POST['hargaJual'];

    $penjualan->update($id, $jumlahPenjualan, $hargaJual);
    header('Location: ListPenjualan.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Penjualan</title>
</head>
<body>
    <h1>Edit Penjualan</h1>
    <form method="POST" action="">
        <label for="jumlahPenjualan">Jumlah Penjualan:</label>
        <input type="number" id="jumlahPenjualan" name="jumlahPenjualan" value="<?php echo htmlspecialchars($item['JumlahPenjualan']); ?>" required><br>

        <label for="hargaJual">Harga Jual:</label>
        <input type="text" id="hargaJual" name="hargaJual" value="<?php echo htmlspecialchars($item['HargaJual']); ?>" required><br>

        <input type="submit" value="Update Penjualan">
    </form>
    <a href="ListPenjualan.php">Back to List</a>
</body>
</html>
