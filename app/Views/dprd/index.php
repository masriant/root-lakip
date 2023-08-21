<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Daftar Bimtek</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/dprd/create" class="btn btn-primary my-3">Tambah Data Anggota</a>
            <!-- FlashData -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <!-- FlashData -->

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Images</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($dprd as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $b['nama']; ?></td>
                            <td><?= $b['jabatan']; ?></td>
                            <td><?= $b['instansi']; ?></td>
                            <!-- <td><a href="<?= $b['sampul']; ?>" target="_blank" class="btn btn-success">Images</a></td> -->
                            <td><img src="/images/<?= $b['sampul']; ?>" class="sampul" alt="No Image"></td>
                            <!-- <td><img src="/images/<?= $b['sampul']; ?>" class="sampul img-fluid rounded-start" alt="..."></td> -->
                            <td>
                                <a href="/dprd/<?= $b['slug']; ?>" class="btn btn-primary">Details</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
            <?= $pager->links('dprd', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>