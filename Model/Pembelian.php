<?php
class Pembelian {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($jumlahPembelian, $hargaBeli, $idPengguna, $idBarang) {
        $query = $this->db->prepare("INSERT INTO Pembelian (JumlahPembelian, HargaBeli, IdPengguna, IdBarang) VALUES (?, ?, ?, ?)");
        return $query->execute([$jumlahPembelian, $hargaBeli, $idPengguna, $idBarang]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Pembelian");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $jumlahPembelian, $hargaBeli) {
        $query = $this->db->prepare("UPDATE Pembelian SET JumlahPembelian = ?, HargaBeli = ? WHERE id = ?");
        return $query->execute([$jumlahPembelian, $hargaBeli, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Pembelian WHERE id = ?");
        return $query->execute([$id]);
    }

    public function readItem($id) {
        $query = $this->db->prepare("SELECT * FROM Pembelian WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}
