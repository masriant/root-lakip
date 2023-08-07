<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/materi/create" class="btn btn-primary mt-3">Tambah Data Materi</a>
            <h1 class="mt-2">Daftar Materi</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($materi as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/images/<?= $m['sampul']; ?>" alt="" class="sampul"></td>
                            <td><?= $m['judul']; ?></td>
                            <td>
                                <a href="/materi/<?= $m['slug']; ?>" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>