<?php
require 'Pengguna.php';

$db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

$pengguna = new Pengguna($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['namaPengguna'])) {
        if (isset($_GET['id'])) {
            $pengguna->update($_GET['id'], $_POST['namaPengguna'], $_POST['password'], $_POST['namaDepan'], $_POST['namaBelakang'], $_POST['noHp'], $_POST['alamat'], $_POST['idAkses']);
        } else {
            $pengguna->create($_POST['namaPengguna'], $_POST['password'], $_POST['namaDepan'], $_POST['namaBelakang'], $_POST['noHp'], $_POST['alamat'], $_POST['idAkses']);
        }
    }
} elseif (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $pengguna->delete($_GET['id']);
}

$penggunaList = $pengguna->read();
require 'ListPengguna.php';
?>
