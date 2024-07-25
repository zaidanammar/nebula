<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penjualan</title>
</head>
<body>
    <h1>Daftar Penjualan</h1>
    <a href="add_penjualan.php">Tambah Penjualan</a>
    <table border="1">
        <tr>
            <th>Jumlah Penjualan</th>
            <th>Harga Jual</th>
            <th>Penjual</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($penjualanList as $penjualan): ?>
        <tr>
            <td><?= $penjualan['JumlahPenjualan']; ?></td>
            <td><?= $penjualan['HargaJual']; ?></td>
            <td><?= $penjualan['IdPengguna']; ?></td>
            <td>
                <a href="edit_penjualan.php?id=<?= $penjualan['IdPenjualan']; ?>">Edit</a>
                <a href="delete_penjualan.php?id=<?= $penjualan['IdPenjualan']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
