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

// Check if 'id' is present in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instantiate the Barang class
    $pengguna = new Pengguna($pdo);
    
    // Delete the item
    if ($pengguna->delete($id)) {
        // Redirect to the list page
        header('Location: ListPengguna.php');
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "Invalid ID.";
}
?>