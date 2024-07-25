<?php
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
        $query = $this->db->prepare("UPDATE Barang SET NamaBarang = ?, Keterangan = ?, Satuan = ? WHERE IdBarang = ?");
        return $query->execute([$namaBarang, $keterangan, $satuan, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Barang WHERE IdBarang = ?");
        return $query->execute([$id]);
    }
}
