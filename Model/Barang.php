<?php
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

class Barang {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($namaBarang, $keterangan, $satuan, $idPengguna) {
        $query = $this->db->prepare("INSERT INTO Barang (NamaBarang, Keterangan, Satuan, IdPengguna) VALUES (?, ?, ?, ?)");
        return $query->execute([$namaBarang, $keterangan, $satuan, $idPengguna]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Barang");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $namaBarang, $keterangan, $satuan) {
        $query = $this->db->prepare("UPDATE Barang SET NamaBarang = ?, Keterangan = ?, Satuan = ? WHERE id = ?");
        return $query->execute([$namaBarang, $keterangan, $satuan, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Barang WHERE id = ?");
        return $query->execute([$id]);
    }
    
    public function readItem($id) {
        $query = $this->db->prepare("SELECT * FROM Barang WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
