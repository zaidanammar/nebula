<?php
class Pembelian {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($jumlahPembelian, $hargaBeli, $idPengguna) {
        $query = $this->db->prepare("INSERT INTO Pembelian (JumlahPembelian, HargaBeli, IdPengguna) VALUES (?, ?, ?)");
        return $query->execute([$jumlahPembelian, $hargaBeli, $idPengguna]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Pembelian");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $jumlahPembelian, $hargaBeli) {
        $query = $this->db->prepare("UPDATE Pembelian SET JumlahPembelian = ?, HargaBeli = ? WHERE IdPembelian = ?");
        return $query->execute([$jumlahPembelian, $hargaBeli, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Pembelian WHERE IdPembelian = ?");
        return $query->execute([$id]);
    }
}
