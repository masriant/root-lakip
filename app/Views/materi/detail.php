<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Materi</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/images/<?= $materi['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $materi['judul']; ?></h5>
                            <p class="card-text"><b>Penulis :</b> <?= $materi['penulis']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Penerbit :</b> <?= $materi['penerbit']; ?></small></p>

                            <a href="/materi/edit/<?= $materi['slug']; ?>" class="btn btn-warning"> Edit</a>

                            <form action="/materi/<?= $materi['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini? Tindakan ini dapat menghapus dari Database!')">Delete</button>
                            </form>
                            <a href="/materi" class="btn btn-success d-inline"> Back to List Materi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>