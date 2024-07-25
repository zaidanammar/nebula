<?php
class Pengguna {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses) {
        $query = $this->db->prepare("INSERT INTO Pengguna (NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $query->execute([$namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM Pengguna");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses) {
        $query = $this->db->prepare("UPDATE Pengguna SET NamaPengguna = ?, Password = ?, NamaDepan = ?, NamaBelakang = ?, NoHp = ?, Alamat = ?, IdAkses = ? WHERE IdPengguna = ?");
        return $query->execute([$namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM Pengguna WHERE IdPengguna = ?");
        return $query->execute([$id]);
    }
}
