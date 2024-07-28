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

// Check if 'id' is present in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instantiate the Barang class
    $pembelian = new Pembelian($pdo);
    
    // Delete the item
    if ($pembelian->delete($id)) {
        // Redirect to the list page
        header('Location: ListPembelian.php');
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "Invalid ID.";
}
?>