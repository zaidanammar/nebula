<?php
require_once '../Model/Pembelian.php';

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
$pembelian = new Pembelian($pdo);

// Fetch the item to edit
$item = $pembelian->readItem($id);
if (!$item) {
    die("Item not found.");
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlahPembelian = $_POST['jumlahPembelian'];
    $hargaBeli = $_POST['hargaBeli'];

    $pembelian->update($id, $jumlahPembelian, $hargaBeli);
    header('Location: ListPembelian.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pembelian</title>
</head>
<body>
    <h1>Edit Pembelian</h1>
    <form method="POST" action="">
        <label for="jumlahPembelian">Jumlah Pembelian:</label>
        <input type="number" id="jumlahPembelian" name="jumlahPembelian" value="<?php echo htmlspecialchars($item['JumlahPembelian']); ?>" required><br>

        <label for="hargaBeli">Harga Beli:</label>
        <input type="text" id="hargaBeli" name="hargaBeli" value="<?php echo htmlspecialchars($item['HargaBeli']); ?>" required><br>

        <input type="submit" value="Update Pembelian">
    </form>
    <a href="ListPembelian.php">Back to List</a>
</body>
</html>
