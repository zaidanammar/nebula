<?php
require_once '../Model/HakAkses.php';

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
$hakAkses = new HakAkses($pdo);

// Fetch the item to edit
$item = $hakAkses->readItem($id);
if (!$item) {
    die("Item not found.");
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaAkses = $_POST['namaAkses'];
    $keterangan = $_POST['keterangan'];

    $hakAkses->update($id, $namaAkses, $keterangan);
    header('Location: ListHakAkses.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hak Akses</title>
</head>
<body>
    <h1>Edit Hak Akses</h1>
    <form method="POST" action="">
        <label for="namaAkses">Nama Akses:</label>
        <input type="text" id="namaAkses" name="namaAkses" value="<?php echo htmlspecialchars($item['NamaAkses']); ?>" required><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($item['Keterangan']); ?>" required><br>

        <input type="submit" value="Update Hak Akses">
    </form>
    <a href="ListHakAkses.php">Back to List</a>
</body>
</html>
