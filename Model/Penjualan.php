<?php
class Penjualan {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($jumlahPenjualan, $hargaJual, $idPengguna, $idBarang) {
        $query = $this->db->prepare("INSERT INTO Penjualan (JumlahPenjualan, HargaJual, IdPengguna, IdBarang) VALUES (?, ?, ?, ?)");
        return $query->execute([$jumlahPenjualan, $hargaJual, $idPengguna, $idBarang]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Penjualan");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $jumlahPenjualan, $hargaJual) {
        $query = $this->db->prepare("UPDATE Penjualan SET JumlahPenjualan = ?, HargaJual = ? WHERE id = ?");
        return $query->execute([$jumlahPenjualan, $hargaJual, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Penjualan WHERE id = ?");
        return $query->execute([$id]);
    }

    public function getProfitLoss() {
        $query = $this->db->query("
            SELECT SUM((Penjualan.HargaJual - Pembelian.HargaBeli) * Penjualan.JumlahPenjualan) AS ProfitLoss
            FROM Penjualan
            JOIN Barang ON Penjualan.IdBarang = Barang.id
            JOIN Pembelian ON Barang.id = Pembelian.IdBarang
        ");
        return $query->fetch(PDO::FETCH_ASSOC)['ProfitLoss'];
    }

    public function readItem($id) {
        $query = $this->db->prepare("SELECT * FROM Penjualan WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}
