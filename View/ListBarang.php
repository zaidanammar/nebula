<?php
require_once '../Model/Barang.php'; // Ensure the path is correct

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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaBarang = $_POST['namaBarang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $idPengguna = $_POST['idPengguna'];

    $barang = new Barang($pdo);
    $barang->create($namaBarang, $keterangan, $satuan, $idPengguna);

    // Redirect to avoid form resubmission
    header('Location: ListBarang.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>

    <!-- Form to add a new Barang -->
    <form method="POST" action="">
        <label for="namaBarang">Nama Barang:</label>
        <input type="text" id="namaBarang" name="namaBarang" required><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" required><br>

        <label for="satuan">Satuan:</label>
        <input type="text" id="satuan" name="satuan" required><br>

        <label for="idPengguna">ID Pengguna:</label>
        <input type="number" id="idPengguna" name="idPengguna" required><br>

        <input type="submit" value="Tambah Barang">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Satuan</th>
                <th>Pemilik</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $barang = new Barang($pdo);
            $rows = $barang->read();

            foreach ($rows as $row) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['NamaBarang']}</td>
                    <td>{$row['Keterangan']}</td>
                    <td>{$row['Satuan']}</td>
                    <td>{$row['IdPengguna']}</td>
                    <td>
                        <a href='EditBarang.php?id={$row['id']}'>Edit</a>
                        --
                        <a href='DeleteBarang.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\");'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>
<a href='../index.php'>Kembali ke Index</a>
</html>
