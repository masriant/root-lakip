<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Peserta</h2>
            <form action="/dprd/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mb-4">
                    <label for="users" class="col-sm-2 col-form-label">UserID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('users')) ? 'is-invalid' : ''; ?>" id="users" name="users" value="<?= old('users'); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('users'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="kelamin" class="col-sm-2 col-form-label">JK</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-sm <?= ($validation->hasError('kelamin')) ? 'is-invalid' : ''; ?>" id="kelamin" name="kelamin" value="<?= old('kelamin'); ?>">
                            <option selected>--- Pilih ---</option>
                            <option value="Laki-laki">Bapak</option>
                            <option value="Perempuan">Ibu</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kelamin'); ?>
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
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= old('jabatan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jabatan'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= old('instansi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('instansi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="kab_kota" class="col-sm-2 col-form-label">Kab./Kota </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="<?= old('kab_kota'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kab_kota'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="propinsi" class="col-sm-2 col-form-label">Propinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="propinsi" name="propinsi" value="<?= old('propinsi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('propinsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= old('whatsapp'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('whatsapp'); ?>
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
                    <label for="refferal" class="col-sm-2 col-form-label">Refferal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="refferal" name="refferal" value="<?= old('refferal'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('refferal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="partai" class="col-sm-2 col-form-label">Partai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="partai" name="partai" value="<?= old('partai'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('partai'); ?>
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
                <a href="/dprd" class="btn btn-warning d-inline">Back</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>