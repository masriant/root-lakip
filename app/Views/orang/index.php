<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Daftar Orang</h1>
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
            <a href="/orang/create" class="btn btn-primary my-3">Tambah Data Materi</a>
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
                        <th scope="col">Alamat</th>
                        <!-- <th scope="col">WhatsApp</th>
                        <th scope="col">Telepon</th> -->
                        <th scope="col">Images</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($orang as $o) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o['alamat']; ?></td>
                            <!-- <td><a href="tel:<?= $o['whatsapp']; ?>" class="btn btn-success">WhatsApp</a></td> -->

                            <!-- <td><a href="https://api.whatsapp.com/send?phone=62<?= $o['whatsapp']; ?>&text=&source=&data=" target="_blank" class="btn btn-success">WhatsApp</a></td>
                            <td><a href="https://api.whatsapp.com/send?phone=<?= $o['telepon']; ?>&text=&source=&data=" target="_blank" class="btn btn-success">Telepon</a></td> -->

                            <!-- <td><a href="<?= $o['sampul']; ?>" target="_blank" class="btn btn-success">Images</a></td> -->
                            <td><img src="/images/<?= $o['sampul']; ?>" class="sampul" alt="No Image"></td>
                            <!-- <td><img src="/images/<?= $o['sampul']; ?>" class="sampul img-fluid rounded-start" alt="..."></td> -->
                            <td>
                                <a href="/orang/<?= $o['slug']; ?>" class="btn btn-primary">Details</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
            <?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>