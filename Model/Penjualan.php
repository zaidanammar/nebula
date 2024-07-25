<?php
class Penjualan {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($jumlahPenjualan, $hargaJual, $idPengguna) {
        $query = $this->db->prepare("INSERT INTO Penjualan (JumlahPenjualan, HargaJual, IdPengguna) VALUES (?, ?, ?)");
        return $query->execute([$jumlahPenjualan, $hargaJual, $idPengguna]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Penjualan");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $jumlahPenjualan, $hargaJual) {
        $query = $this->db->prepare("UPDATE Penjualan SET JumlahPenjualan = ?, HargaJual = ? WHERE IdPenjualan = ?");
        return $query->execute([$jumlahPenjualan, $hargaJual, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Penjualan WHERE IdPenjualan = ?");
        return $query->execute([$id]);
    }

    public function getProfitLoss() {
        $query = $this->db->query("SELECT SUM((HargaJual - HargaBeli) * JumlahPenjualan) AS ProfitLoss FROM Penjualan JOIN Barang ON Penjualan.IdBarang = Barang.IdBarang");
        return $query->fetch(PDO::FETCH_ASSOC)['ProfitLoss'];
    }
}
