<?php
require_once '../Model/Pengguna.php'; // Ensure the path is correct

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
    $namaPengguna = $_POST['namaPengguna'];
    $pass = $_POST['pass'];
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $idAkses = $_POST['idAkses'];

    $pengguna = new Pengguna($pdo);
    $pengguna->create($namaPengguna, $pass, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses);

    // Redirect to avoid form resubmission
    header('Location: ListPengguna.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>

    <!-- Form to add a new Pengguna -->
    <form method="POST" action="">
        <label for="namaPengguna">Nama Pengguna:</label>
        <input type="text" id="namaPengguna" name="namaPengguna" required><br>

        <label for="pass">Password:</label>
        <input type="pass" id="pass" name="pass" required><br>

        <label for="namaDepan">Nama Depan:</label>
        <input type="text" id="namaDepan" name="namaDepan" required><br>

        <label for="namaBelakang">Nama Belakang:</label>
        <input type="text" id="namaBelakang" name="namaBelakang" required><br>

        <label for="noHp">No HP:</label>
        <input type="text" id="noHp" name="noHp" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br>

        <label for="idAkses">ID Akses:</label>
        <input type="number" id="idAkses" name="idAkses" required><br>

        <input type="submit" value="Tambah Pengguna">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Pengguna</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>ID Akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pengguna = new Pengguna($pdo);
            $rows = $pengguna->read();

            foreach ($rows as $row) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['NamaPengguna']}</td>
                    <td>{$row['NamaDepan']}</td>
                    <td>{$row['NamaBelakang']}</td>
                    <td>{$row['NoHp']}</td>
                    <td>{$row['Alamat']}</td>
                    <td>{$row['IdAkses']}</td>
                    <td>
                        <a href='EditPengguna.php?id={$row['id']}'>Edit</a>
                        --
                        <a href='DeletePengguna.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\");'>Delete</a>
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
