<?php
require_once '../Model/HakAkses.php'; // Ensure the path is correct

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
    $namaAkses = $_POST['namaAkses'];
    $keterangan = $_POST['keterangan'];

    $hakAkses = new HakAkses($pdo);
    $hakAkses->create($namaAkses, $keterangan);

    // Redirect to avoid form resubmission
    header('Location: ListHakAkses.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Hak Akses</title>
</head>
<body>
    <h1>Daftar Hak Akses</h1>

    <!-- Form to add a new Hak Akses -->
    <form method="POST" action="">
        <label for="namaAkses">Nama Akses:</label>
        <input type="text" id="namaAkses" name="namaAkses" required><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" required><br>

        <input type="submit" value="Tambah Hak Akses">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Akses</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $hakAkses = new HakAkses($pdo);
            $rows = $hakAkses->read();

            foreach ($rows as $row) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['NamaAkses']}</td>
                    <td>{$row['Keterangan']}</td>
                    <td>
                        <a href='EditHakAkses.php?id={$row['id']}'>Edit</a>
                        --
                        <a href='DeleteHakAkses.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\");'>Delete</a>
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
