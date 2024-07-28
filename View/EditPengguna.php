<?php
require_once '../Model/Pengguna.php';

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
$pengguna = new Pengguna($pdo);

// Fetch the item to edit
$item = $pengguna->readItem($id);
if (!$item) {
    die("Item not found.");
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPengguna = $_POST['namaPengguna'];
    $pass = $_POST['pass'];
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $idAkses = $_POST['idAkses'];

    $pengguna->update($id, $namaPengguna, $pass, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses);
    header('Location: ListPengguna.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form method="POST" action="">
        <label for="namaPengguna">Nama Pengguna:</label>
        <input type="text" id="namaPengguna" name="namaPengguna" value="<?php echo htmlspecialchars($item['NamaPengguna']); ?>" required><br>

        <label for="pass">Password:</label>
        <input type="pass" id="pass" name="pass" value="<?php echo htmlspecialchars($item['Pass']); ?>" required><br>

        <label for="namaDepan">Nama Depan:</label>
        <input type="text" id="namaDepan" name="namaDepan" value="<?php echo htmlspecialchars($item['NamaDepan']); ?>" required><br>

        <label for="namaBelakang">Nama Belakang:</label>
        <input type="text" id="namaBelakang" name="namaBelakang" value="<?php echo htmlspecialchars($item['NamaBelakang']); ?>" required><br>

        <label for="noHp">No HP:</label>
        <input type="text" id="noHp" name="noHp" value="<?php echo htmlspecialchars($item['NoHp']); ?>" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($item['Alamat']); ?>" required><br>

        <label for="idAkses">ID Akses:</label>
        <input type="number" id="idAkses" name="idAkses" value="<?php echo htmlspecialchars($item['IdAkses']); ?>" required><br>

        <input type="submit" value="Update Pengguna">
    </form>
    <a href="ListPengguna.php">Back to List</a>
</body>
</html>
