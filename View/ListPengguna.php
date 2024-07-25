<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <a href="add_pengguna.php">Tambah Pengguna</a>
    <table border="1">
        <tr>
            <th>Nama Pengguna</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Hak Akses</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($penggunaList as $pengguna): ?>
        <tr>
            <td><?= $pengguna['NamaPengguna']; ?></td>
            <td><?= $pengguna['NamaDepan']; ?></td>
            <td><?= $pengguna['NamaBelakang']; ?></td>
            <td><?= $pengguna['NoHp']; ?></td>
            <td><?= $pengguna['Alamat']; ?></td>
            <td><?= $pengguna['IdAkses']; ?></td>
            <td>
                <a href="edit_pengguna.php?id=<?= $pengguna['IdPengguna']; ?>">Edit</a>
                <a href="delete_pengguna.php?id=<?= $pengguna['IdPengguna']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
