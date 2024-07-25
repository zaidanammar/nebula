<?php
require 'Barang.php';

$db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

$barang = new Barang($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['namaBarang'])) {
        if (isset($_GET['id'])) {
            $barang->update($_GET['id'], $_POST['namaBarang'], $_POST['keterangan'], $_POST['satuan']);
        } else {
            $barang->create($_POST['namaBarang'], $_POST['keterangan'], $_POST['satuan'], $_POST['idPengguna']);
        }
    }
} elseif (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $barang->delete($_GET['id']);
}

$barangList = $barang->read();
require 'index.php';
?>
