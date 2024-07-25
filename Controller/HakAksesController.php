<?php
require 'HakAkses.php';

$db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

$hakAkses = new HakAkses($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['namaAkses'])) {
        if (isset($_GET['id'])) {
            $hakAkses->update($_GET['id'], $_POST['namaAkses'], $_POST['keterangan']);
        } else {
            $hakAkses->create($_POST['namaAkses'], $_POST['keterangan']);
        }
    }
} elseif (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $hakAkses->delete($_GET['id']);
}

$hakAksesList = $hakAkses->read();
require 'ListHakAkses.php';
?>
