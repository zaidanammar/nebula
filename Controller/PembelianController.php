<?php
require 'Pembelian.php';

$db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

$pembelian = new Pembelian($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['jumlahPembelian'])) {
        if (isset($_GET['id'])) {
            $pembelian->update($_GET['id'], $_POST['jumlahPembelian'], $_POST['hargaBeli']);
        } else {
            $pembelian->create($_POST['jumlahPembelian'], $_POST['hargaBeli'], $_POST['idPengguna']);
        }
    }
} elseif (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $pembelian->delete($_GET['id']);
}

$pembelianList = $pembelian->read();
require 'ListPembelian.php';
?>
