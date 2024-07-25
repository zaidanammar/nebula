<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembelian</title>
</head>
<body>
    <h1>Daftar Pembelian</h1>
    <a href="add_pembelian.php">Tambah Pembelian</a>
    <table border="1">
        <tr>
            <th>Jumlah Pembelian</th>
            <th>Harga Beli</th>
            <th>Pembeli</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pembelianList as $pembelian): ?>
        <tr>
            <td><?= $pembelian['JumlahPembelian']; ?></td>
            <td><?= $pembelian['HargaBeli']; ?></td>
            <td><?= $pembelian['IdPengguna']; ?></td>
            <td>
                <a href="edit_pembelian.php?id=<?= $pembelian['IdPembelian']; ?>">Edit</a>
                <a href="delete_pembelian.php?id=<?= $pembelian['IdPembelian']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
