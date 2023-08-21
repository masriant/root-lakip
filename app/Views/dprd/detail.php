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
                        <img src="/images/<?= $dprd['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $dprd['nama']; ?> <small class="text-body-secondary">(<?= $dprd['jabatan']; ?>)</small></h5>
                            <p class="card-text"><small class="text-body-secondary"><b>Jenis :</b> <?= $dprd['kelamin']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Instansi :</b> <?= $dprd['instansi']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Kab./Kota :</b> <?= $dprd['kab_kota']; ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Propinsi :</b> <?= $dprd['propinsi']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Partai :</b> <?= $dprd['partai']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Whatsapp :</b> <?= $dprd['whatsapp']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Email :</b> <?= $dprd['email']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Refferal. :</b> <?= $dprd['refferal']; ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Terdata sejak :</b> <?= $dprd['created_at']; ?> </small></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Last Update :</b> <?= $dprd['updated_at']; ?> </small></p>
                            <br>
                            <a href="/dprd/edit/<?= $dprd['slug']; ?>" class="btn btn-warning"> Edit </a>


                            <form action="/dprd/<?= $dprd['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini? Tindakan ini dapat menghapus dari Database!')">Delete</button>
                            </form>
                            <a href="/dprd" class="btn btn-success d-inline"> Back to List Orang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>