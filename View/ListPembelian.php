<?php
require_once '../Model/Pembelian.php'; // Ensure the path is correct

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
    $jumlahPembelian = $_POST['jumlahPembelian'];
    $hargaBeli = $_POST['hargaBeli'];
    $idPengguna = $_POST['idPengguna'];
    $idBarang = $_POST['idBarang'];

    $pembelian = new Pembelian($pdo);
    $pembelian->create($jumlahPembelian, $hargaBeli, $idPengguna, $idBarang);

    // Redirect to avoid form resubmission
    header('Location: ListPembelian.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembelian</title>
</head>
<body>
    <h1>Daftar Pembelian</h1>

    <!-- Form to add a new Pembelian -->
    <form method="POST" action="">
        <label for="jumlahPembelian">Jumlah Pembelian:</label>
        <input type="number" id="jumlahPembelian" name="jumlahPembelian" required><br>

        <label for="hargaBeli">Harga Beli:</label>
        <input type="text" id="hargaBeli" name="hargaBeli" required><br>

        <label for="idPengguna">ID Pengguna:</label>
        <input type="number" id="idPengguna" name="idPengguna" required><br>

        <label for="idBarang">ID Barang:</label>
        <input type="number" id="idBarang" name="idBarang" required><br>

        <input type="submit" value="Tambah Pembelian">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Jumlah Pembelian</th>
                <th>Harga Beli</th>
                <th>ID Pengguna</th>
                <th>ID Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pembelian = new Pembelian($pdo);
            $rows = $pembelian->read();

            foreach ($rows as $row) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['JumlahPembelian']}</td>
                    <td>{$row['HargaBeli']}</td>
                    <td>{$row['IdPengguna']}</td>
                    <td>{$row['IdBarang']}</td>
                    <td>
                        <a href='EditPembelian.php?id={$row['id']}'>Edit</a>
                        --
                        <a href='DeletePembelian.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\");'>Delete</a>
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
