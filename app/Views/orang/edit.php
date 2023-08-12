<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Materi</h2>
            <form action="/orang/update/<?= $orang['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $orang['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $orang['sampul']; ?>">
                <div class="form-group row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $orang['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $orang['alamat'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= (old('whatsapp')) ? old('whatsapp') : $orang['whatsapp'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('whatsapp'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/images/<?= $orang['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="Sampul"><?= $orang['sampul']; ?></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-inline">Ubah Data</button>
                <a href="/orang" class="btn btn-warning d-inline">Back</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>