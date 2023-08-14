<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Peserta</h2>
            <form action="/orang/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mb-4">
                    <label for="users" class="col-sm-2 col-form-label">UserID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('users')) ? 'is-invalid' : ''; ?>" id="users" name="users" autofocus value="<?= old('users'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('users'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="whatsapp" name="whatsapp" value="<?= old('whatsapp'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('whatsapp'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="telepon" name="telepon" value="<?= old('telepon'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('telepon'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/images/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="Sampul">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-inline">Tambah Data</button>
                <a href="/orang" class="btn btn-warning d-inline">Back</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>