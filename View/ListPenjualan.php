<?php
require_once '../Model/Penjualan.php'; // Ensure the path is correct

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
    $jumlahPenjualan = $_POST['jumlahPenjualan'];
    $hargaJual = $_POST['hargaJual'];
    $idPengguna = $_POST['idPengguna'];
    $idBarang = $_POST['idBarang'];

    $penjualan = new Penjualan($pdo);
    $penjualan->create($jumlahPenjualan, $hargaJual, $idPengguna, $idBarang);

    // Redirect to avoid form resubmission
    header('Location: ListPenjualan.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penjualan</title>
</head>
<body>
    <h1>Daftar Penjualan</h1>

    <!-- Form to add a new Penjualan -->
    <form method="POST" action="">
        <label for="jumlahPenjualan">Jumlah Penjualan:</label>
        <input type="number" id="jumlahPenjualan" name="jumlahPenjualan" required><br>

        <label for="hargaJual">Harga Jual:</label>
        <input type="text" id="hargaJual" name="hargaJual" required><br>

        <label for="idPengguna">ID Pengguna:</label>
        <input type="number" id="idPengguna" name="idPengguna" required><br>

        <label for="idBarang">ID Barang:</label>
        <input type="number" id="idBarang" name="idBarang" required><br>

        <input type="submit" value="Tambah Penjualan">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Jumlah Penjualan</th>
                <th>Harga Jual</th>
                <th>ID Pengguna</th>
                <th>ID Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $penjualan = new Penjualan($pdo);
            $rows = $penjualan->read();

            foreach ($rows as $row) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['JumlahPenjualan']}</td>
                    <td>{$row['HargaJual']}</td>
                    <td>{$row['IdPengguna']}</td>
                    <td>{$row['IdBarang']}</td>
                    <td>
                        <a href='EditPenjualan.php?id={$row['id']}'>Edit</a>
                        --
                        <a href='DeletePenjualan.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\");'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <a href='../index.php'>Kembali ke Index</a>
</body>
</html>
