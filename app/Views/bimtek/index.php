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
            <a href="/bimtek/create" class="btn btn-primary my-3">Tambah Data Materi</a>
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
                        <th scope="col">Judul</th>
                        <th scope="col">Konten</th>
                        <th scope="col">Images</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($blognews as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $b['post_title']; ?></td>
                            <td><?= $b['post_content']; ?></td>
                            <!-- <td><a href="<?= $b['sampul']; ?>" target="_blank" class="btn btn-success">Images</a></td> -->
                            <td><img src="/images/<?= $b['sampul']; ?>" class="sampul" alt="No Image"></td>
                            <!-- <td><img src="/images/<?= $b['sampul']; ?>" class="sampul img-fluid rounded-start" alt="..."></td> -->
                            <td>
                                <a href="/bimtek/<?= $b['slug']; ?>" class="btn btn-primary">Details</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
            <?= $pager->links('blognews', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>