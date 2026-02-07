<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4" style="max-width: 600px;">

    <div class="card">
        <div class="card-header">
            <strong><?= isset($produk) ? 'Edit' : 'Tambah' ?> Produk</strong>
        </div>

        <div class="card-body">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text"
                           name="nama_produk"
                           class="form-control"
                           value="<?= set_value('nama_produk', isset($produk) ? $produk->nama_produk : '') ?>">
                    <?= form_error('nama_produk', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="<?= set_value('harga', isset($produk) ? $produk->harga : '') ?>">
                    <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k->id_kategori ?>"
                                <?= set_select(
                                    'kategori_id',
                                    $k->id_kategori,
                                    isset($produk) && $produk->kategori_id == $k->id_kategori
                                ) ?>>
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori_id', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status_id" class="form-select">
                        <option value="">-- Pilih Status --</option>
                        <?php foreach ($status as $s): ?>
                            <option value="<?= $s->id_status ?>"
                                <?= set_select(
                                    'status_id',
                                    $s->id_status,
                                    isset($produk) && $produk->status_id == $s->id_status
                                ) ?>>
                                <?= $s->nama_status ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('status_id', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('produk') ?>" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>


</body>
</html>

