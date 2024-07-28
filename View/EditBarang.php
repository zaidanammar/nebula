<?php
require_once '../Model/Barang.php';

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
$barang = new Barang($pdo);

// Fetch the item to edit
$item = $barang->readItem($id);
if (!$item) {
    die("Item not found.");
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaBarang = $_POST['namaBarang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];

    $barang->update($id, $namaBarang, $keterangan, $satuan);
    header('Location: ListBarang.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang</h1>
    <form method="POST" action="">
        <label for="namaBarang">Nama Barang:</label>
        <input type="text" id="namaBarang" name="namaBarang" value="<?php echo htmlspecialchars($item['NamaBarang']); ?>" required><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($item['Keterangan']); ?>" required><br>

        <label for="satuan">Satuan:</label>
        <input type="text" id="satuan" name="satuan" value="<?php echo htmlspecialchars($item['Satuan']); ?>" required><br>

        <input type="submit" value="Update Barang">
    </form>
    <a href="ListBarang.php">Back to List</a>
</body>
</html>