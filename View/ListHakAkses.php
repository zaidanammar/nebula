<!DOCTYPE html>
<html>
<head>
    <title>Daftar Hak Akses</title>
</head>
<body>
    <h1>Daftar Hak Akses</h1>
    <a href="add_hak_akses.php">Tambah Hak Akses</a>
    <table border="1">
        <tr>
            <th>Nama Akses</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($hakAksesList as $hakAkses): ?>
        <tr>
            <td><?= $hakAkses['NamaAkses']; ?></td>
            <td><?= $hakAkses['Keterangan']; ?></td>
            <td>
                <a href="edit_hak_akses.php?id=<?= $hakAkses['IdAkses']; ?>">Edit</a>
                <a href="delete_hak_akses.php?id=<?= $hakAkses['IdAkses']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
