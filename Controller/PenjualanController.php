<?php
require 'Penjualan.php';

$db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

$penjualan = new Penjualan($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['jumlahPenjualan'])) {
        if (isset($_GET['id'])) {
            $penjualan->update($_GET['id'], $_POST['jumlahPenjualan'], $_POST['hargaJual']);
        } else {
            $penjualan->create($_POST['jumlahPenjualan'], $_POST['hargaJual'], $_POST['idPengguna']);
        }
    }
} elseif (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $penjualan->delete($_GET['id']);
}

$penjualanList = $penjualan->read();
require 'ListPenjualan.php';
?>
