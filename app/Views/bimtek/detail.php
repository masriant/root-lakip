<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Detail Peserta</h2>
            <!-- FlashData -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <!-- FlashData -->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/images/<?= $blognews['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $blognews['post_title']; ?></h5>
                            <p class="card-text"><b>Alamat :</b> <?= $blognews['post_content']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Author :</b> <?= $blognews['post_author']; ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Posting :</b> <?= $blognews['post_date']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Created At :</b> <?= $blognews['created_at']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Last Update :</b> <?= $blognews['updated_at']; ?> </small></p>
                            <br>
                            <a href="/bimtek/edit/<?= $blognews['slug']; ?>" class="btn btn-warning"> Edit </a>


                            <form action="/bimtek/<?= $blognews['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini? Tindakan ini dapat menghapus dari Database!')">Delete</button>
                            </form>
                            <a href="/bimtek" class="btn btn-success d-inline"> Back to List Orang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>