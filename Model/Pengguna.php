<?php
class Pengguna {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($namaPengguna, $pass, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses) {
        $query = $this->db->prepare("INSERT INTO Pengguna (NamaPengguna, Pass, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $query->execute([$namaPengguna, $pass, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Pengguna");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $namaPengguna, $pass, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses) {
        $query = $this->db->prepare("UPDATE Pengguna SET NamaPengguna = ?, Pass = ?, NamaDepan = ?, NamaBelakang = ?, NoHp = ?, Alamat = ?, IdAkses = ? WHERE id = ?");
        return $query->execute([$namaPengguna, $pass, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Pengguna WHERE id = ?");
        return $query->execute([$id]);
    }

    public function readItem($id) {
        $query = $this->db->prepare("SELECT * FROM Pengguna WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}
