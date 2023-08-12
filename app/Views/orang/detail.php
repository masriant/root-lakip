<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Orang</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/images/<?= $orang['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $orang['nama']; ?></h5>
                            <p class="card-text"><b>Alamat :</b> <?= $orang['alamat']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Email :</b> <?= $orang['email']; ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Whatsapp :</b> <?= $orang['whatsapp']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Telp. :</b>
                                    <?= $orang['telepon']; ?> </small></p>
                            <br>
                            <a href="/orang/edit/<?= $orang['slug']; ?>" class="btn btn-warning"> Edit </a>


                            <form action="/orang/<?= $orang['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini? Tindakan ini dapat menghapus dari Database!')">Delete</button>
                            </form>
                            <a href="/orang" class="btn btn-success d-inline"> Back to List Orang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>