<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3">📦 Data Produk</h2>

    <a href="<?= site_url('produk/tambah') ?>" class="btn btn-primary mb-3">
            ➕ Tambah Produk
        </a>

    <form method="get" action="<?= site_url('produk') ?>" class="row g-2 mb-3">
    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="1" <?= ($status == 1) ? 'selected' : '' ?>>
                Bisa Dijual
            </option>
            <option value="2" <?= ($status == 2) ? 'selected' : '' ?>>
                Tidak Bisa Dijual
            </option>
        </select>
    </div>
    <div class="col-md-auto">
        <button type="submit" class="btn btn-secondary">Filter</button>
    </div>
    </form>

    <div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if (empty($produk)) : ?>
            <tr>
                <td colspan="6" class="text-center">Data tidak ada</td>
            </tr>
        <?php else : ?>
            <?php $no = 1; foreach ($produk as $p) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama_produk ?></td>
                <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                <td><?= $p->nama_kategori ?></td>
                <td><?= $p->nama_status ?></td>
                <td class="text-center">
                    <a href="<?= site_url('produk/edit/'.$p->id_produk) ?>" 
                       class="btn btn-sm btn-warning">
                        ✏️ Edit
                    </a>
                    <a href="<?= site_url('produk/hapus/'.$p->id_produk) ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin mau hapus data ini?')">
                        🗑️ Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>
</div>

</div>
</body>
</html>
