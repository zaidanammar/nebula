<?php
class HakAkses {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($namaAkses, $keterangan) {
        $query = $this->db->prepare("INSERT INTO HakAkses (NamaAkses, Keterangan) VALUES (?, ?)");
        return $query->execute([$namaAkses, $keterangan]);
    }

    public function read() {
        $query = $this->db->query("SELECT * FROM HakAkses");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $namaAkses, $keterangan) {
        $query = $this->db->prepare("UPDATE HakAkses SET NamaAkses = ?, Keterangan = ? WHERE IdAkses = ?");
        return $query->execute([$namaAkses, $keterangan, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM HakAkses WHERE IdAkses = ?");
        return $query->execute([$id]);
    }
}
