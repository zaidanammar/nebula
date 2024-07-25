<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <a href="add_barang.php">Tambah Barang</a>
    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Satuan</th>
            <th>Pemilik</th>
            <th>Aksi</th>
        </tr>
        <?php
        foreach ($barangList as $barang): ?>
        <tr>
            <td><?= $barang['NamaBarang']; ?></td>
            <td><?= $barang['Keterangan']; ?></td>
            <td><?= $barang['Satuan']; ?></td>
            <td><?= $barang['IdPengguna']; ?></td>
            <td>
                <a href="edit_barang.php?id=<?= $barang['IdBarang']; ?>">Edit</a>
                <a href="delete_barang.php?id=<?= $barang['IdBarang']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
